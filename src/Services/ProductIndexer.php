<?php

namespace App\Services;

use Elastic\Elasticsearch\Client;
use Pimcore\Model\DataObject\Products;

class ProductIndexer
{
    public function __construct(private Client $client) {}

    public function indexAll(): void
    {
        $list = new Products\Listing();

        foreach ($list as $item) {
            if ($item->getPublished()) {
                $this->indexProduct($item);
            }
        }
    }

    public function indexProduct(Products $product): void
    {
        $this->client->index([
            'index' => 'products',
            'id' => $product->getId(),
            'body' => [
                'id'            => $product->getId(),
                'key'           => $product->getKey(),
                'name'          => $product->getName(),
                'sku'           => $product->getSku(),
                'color'         => $product->getColor(), // array string[]
                'image'         => $this->getImagePath($product), // Xử lý đa kiểu
                'category'      => $this->getCategoryName($product),
                'url'           => $this->getUrlString($product),
                'approved'      => $product->getApproved(),
                'accessory'     => $this->getAccessoryIds($product),
                'video'         => $this->getVideoPath($product),
                'price'         => $product->getPrice(),
                'stockQuantity' => $this->getStockQuantityNumber($product),
                'platforms'     => $product->getPlatforms(), // array string[]
                'description'   => $product->getDescription(),
                'status'        => $product->getStatus(),
                'createdAt'     => $product->getCreatedAt()?->format('Y-m-d H:i:s'),
                'updatedAt'     => $product->getUpdatedAt()?->format('Y-m-d H:i:s'),
            ]
        ]);
    }

    public function deleteFromIndex(Products $product): void
    {
        try {
            $this->client->delete([
                'index' => 'products',
                'id' => $product->getId(),
            ]);
        } catch (\Elastic\Elasticsearch\Exception\ClientResponseException $e) {
            // Bỏ qua nếu lỗi 404 (document not found hoặc index not found)
            if ($e->getCode() === 404) {
                return;
            }
            throw $e; // các lỗi khác vẫn throw để debug
        }
    }

    // --- Helpers ---

    // Xử lý trường Image: Asset hoặc Input đều lấy được path đúng
    private function getImagePath(Products $product): ?string
    {
        $image = $product->getImage();
        if (!$image) return null;

        // Nếu là Asset (file/image object)
        if (is_object($image) && method_exists($image, 'getFullPath')) {
            return $image->getFullPath();
        }
        // Nếu là chuỗi (input/url/path)
        if (is_string($image)) {
            return $image;
        }
        return null;
    }

    // Lấy tên category (nếu là object)
    private function getCategoryName(Products $product): ?string
    {
        $category = $product->getCategory();
        if ($category && method_exists($category, 'getName')) {
            return $category->getName();
        }
        if ($category && method_exists($category, 'getId')) {
            return (string) $category->getId();
        }
        return null;
    }

    // Lấy URL string từ trường link
    private function getUrlString(Products $product): ?string
    {
        $url = $product->getURL();
        if ($url && method_exists($url, 'getHref')) {
            return $url->getHref();
        }
        return null;
    }

    // Lấy list accessory ID (nếu là manyToMany object relation)
    private function getAccessoryIds(Products $product): array
    {
        $accessories = $product->getAccessory();
        $ids = [];
        if (is_array($accessories)) {
            foreach ($accessories as $acc) {
                if (method_exists($acc, 'getId')) {
                    $ids[] = $acc->getId();
                }
            }
        }
        return $ids;
    }

    // Lấy đường dẫn hoặc URL video
    private function getVideoPath(Products $product): ?string
    {
        $video = $product->getVideo();
        if ($video) {
            // Nếu là asset video
            if (method_exists($video, 'getType') && $video->getType() === 'asset' && $video->getData() && method_exists($video->getData(), 'getFullPath')) {
                return $video->getData()->getFullPath();
            }
            // Nếu là youtube/vimeo
            if (method_exists($video, 'getType') && in_array($video->getType(), ['youtube', 'vimeo'])) {
                return $video->getData();
            }
        }
        return null;
    }

    // Lấy số lượng
    private function getStockQuantityNumber(Products $product): ?float
    {
        $quantity = $product->getStockQuantity();
        if ($quantity && method_exists($quantity, 'getValue')) {
            return $quantity->getValue();
        }
        return null;
    }
}
