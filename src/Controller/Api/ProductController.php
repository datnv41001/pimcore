<?php

namespace App\Controller\Api;

use Pimcore\Model\DataObject\Products;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/api/products', name: 'api_products', methods: ['GET'])]
    public function index(): JsonResponse
    {
        $products = new Products\Listing();
        $products->setLimit(10);
        // dd($products);
        $result = [];
        foreach ($products as $product) {
            //  if (in_array('Elasticsearch', $product->getPlatforms() ?? [])) {
            $result[] = [
                'id' => $product->getId(),
                'name' => $product->getName(),
                'description' => $product->getDescription(),
                'image' => $product->getImage()?->getFullPath(),
                'sku' => $product->getSku(),
                // 'status' => $product->getStatus(),
                'platforms' => $product->getPlatforms(),
            ];
        // }
        }

        return $this->json($result);
    }
}
