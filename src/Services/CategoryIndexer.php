<?php

namespace App\Services;

use Elastic\Elasticsearch\Client;
use Pimcore\Model\DataObject\Danhmuc;

class CategoryIndexer
{
    public function __construct(private Client $client) {}

    public function indexAll(): void
    {
        $list = new \Pimcore\Model\DataObject\Danhmuc\Listing();

        foreach ($list as $item) {
            if ($item->getIs_Active()) {
                $this->indexCategory($item);
            }
        }
    }

    public function indexCategory(Danhmuc $category): void
    {
        $this->client->index([
            'index' => 'categories',
            'id' => $category->getId(),
            'body' => [
                'id' => $category->getId(),
                'key' => $category->getKey(),
                'path' => $category->getFullPath(),
                'name' => $category->getName(),
                'slug' => $category->getSlug(),
                'description' => $category->getDescription(),
                'image' => $category->getImage()?->getFullPath(),
                'is_active' => $category->getIs_Active(),
            ]
        ]);
    }

    public function deleteFromIndex(Danhmuc $category): void
    {
        try {
            $this->client->delete([
                'index' => 'categories',
                'id' => $category->getId(),
            ]);
        } catch (\Elastic\Elasticsearch\Exception\ClientResponseException $e) {
            // Bỏ qua nếu lỗi 404 (document not found hoặc index not found)
            if ($e->getCode() === 404) {
                return;
            }
            throw $e; // các lỗi khác vẫn throw để debug
        }
    }
}
