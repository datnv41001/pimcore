<?php

namespace App\Command;

use Carbon\Carbon;
use Pimcore\Model\DataObject\ProductSyncQueue;
use Pimcore\Model\DataObject\Products;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Psr\Log\LoggerInterface;
use Pimcore\Model\DataObject\Data\NumericRange;
use Pimcore\Model\Asset\Image;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;


class ProductSyncQueueCommand extends Command
{
    protected static $defaultName = 'sync:product:queue';

    private LoggerInterface $logger;
    private string $url = 'http://host.docker.internal:8069/jsonrpc';

    private string $db = 'odoo';
    private string $username = 'admin@example.com';
    private string $password = 'admin123';
    private string $baseUrl;

    public function __construct(LoggerInterface $logger, ParameterBagInterface $params)
    {
        parent::__construct();
        $this->logger = $logger;
        $this->baseUrl = getenv('APP_URL') ?: 'http://localhost:9000';
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $queue = new ProductSyncQueue\Listing();
        $queue->addConditionParam("status = ?", 'pending');
        $queue->setLimit(10);

        foreach ($queue as $job) {
            /** @var Products $product */
            $product = $job->getProduct();

            if (!$product) {
                $this->failJob($job, 'Product not found');
                continue;
            }

            try {
                $job->setStatus('processing');
                $job->setLastTriedAt(Carbon::now());
                $job->save();

                $odooId = $this->syncToOdooJsonRpc($product);
                $product->save();

                $job->setStatus('success');
                $job->setMessage("Đồng bộ thành công");
            } catch (\Throwable $e) {
                $job->setStatus('failed');
                // $job->setRetryCount(($job->getRetryCount() ?? 0) + 1);
                $job->setMessage($e->getMessage());
                $this->logger->error('Sync product failed: ' . $e->getMessage(), [
                    'product_id' => $product->getId(),
                    'trace' => $e->getTraceAsString(),
                ]);
            }

            $job->save();
        }

        return Command::SUCCESS;
    }

    private function syncToOdooJsonRpc(Products $product): int
    {

        $uid = $this->jsonRpc('call', [
            'service' => 'common',
            'method' => 'authenticate',
            'args' => [$this->db, $this->username, $this->password, []],
        ]);

        if (!$uid) {
            throw new \RuntimeException('Authentication with Odoo failed.');
        }
        $sku = $product->getSku();
        // ⚠️ Check xem SKU đã tồn tại trong Odoo chưa
        $existing = $this->jsonRpc('call', [
            'service' => 'object',
            'method' => 'execute_kw',
            'args' => [
                $this->db,
                $uid,
                $this->password,
                'product.template',
                'search_read',
                [[['default_code', '=', $sku]]],
                ['fields' => ['id'], 'limit' => 1]
            ],
        ]);

        if (!empty($existing)) {
            throw new \RuntimeException("Sản phẩm với SKU [$sku] đã tồn tại trong Odoo. Bỏ qua.");
        }
        $baseUrl = $_ENV['APP_URL'] ?? 'http://localhost:9000';
        $imagePath = null;
        $image = $product->getImage();
        if ($image) {
            $imagePath = $image->getFullPath();
        }
        $imageUrl = $imagePath ? rtrim($baseUrl, '/') . $imagePath : null;

        $payload = [
            'name' => $product->getName(),
            'default_code' => $product->getSku(),
            'list_price' => $product->getPrice(),
            'description_sale' => $product->getDescription(),
            'image_url' => $imageUrl,
        ];

        $result = $this->jsonRpc('call', [
            'service' => 'object',
            'method' => 'execute_kw',
            'args' => [
                $this->db,
                $uid,
                $this->password,
                'product.template',
                'create',
                [$payload]
            ],
        ]);

        return $result;
    }

    private function jsonRpc(string $method, array $params): mixed
    {
        $data = [
            'jsonrpc' => '2.0',
            'method' => $method,
            'params' => $params,
            'id' => uniqid(),
        ];

        $context = stream_context_create([
            'http' => [
                'header'  => "Content-Type: application/json\r\n",
                'method'  => 'POST',
                'content' => json_encode($data),
                'timeout' => 10,
            ]
        ]);

        $response = file_get_contents($this->url, false, $context);
        if ($response === false) {
            throw new \RuntimeException("Không thể kết nối tới Odoo JSON-RPC.");
        }

        $result = json_decode($response, true);

        // if (isset($result['error'])) {
        //     throw new \RuntimeException("Odoo JSON-RPC Error: " . $result['error']['message']);
        // }
        if (isset($result['error'])) {
            $error = $result['error'];
            $message = $error['message'] ?? 'Unknown error';
            $data = $error['data']['message'] ?? json_encode($error['data'] ?? []);
            throw new \RuntimeException("Odoo JSON-RPC Error: $message - $data");
        }

        return $result['result'] ?? null;
    }

    private function failJob(ProductSyncQueue $job, string $message): void
    {
        $job->setStatus('failed');
        $job->setRetryCount(($job->getRetryCount() ?? 0) + 1);
        $job->setMessage($message);
        $job->setLastTriedAt(Carbon::now());
        $job->save();
    }
}
