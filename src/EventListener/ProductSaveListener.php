<?php

namespace App\EventListener;

use Pimcore\Model\DataObject\Products;
use Pimcore\Model\DataObject\ProductSyncQueue;
use Pimcore\Event\DataObjectEvents;
use Pimcore\Event\Model\DataObjectEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Pimcore\Model\DataObject\Folder;

class ProductSaveListener implements EventSubscriberInterface
{
    public static function getSubscribedEvents(): array
    {
        return [
            DataObjectEvents::POST_ADD => 'onPostAdd',
        ];
    }

    public function onPostAdd(DataObjectEvent $event): void
    {
        $object = $event->getObject();

         if (!$object instanceof Products) {
        return;
    }

    // Chỉ tạo nếu sản phẩm đã được publish
        // if (!$object->isPublished()) {
        //     return;
        // }

        // Kiểm tra nếu đã có trong queue thì bỏ qua
        $existing = new ProductSyncQueue\Listing();
        $existing->addConditionParam('product__id = ?', $object->getId());


        if ($existing->count() > 0) {
            return;
        }

        // Tạo queue mới
        $queue = new ProductSyncQueue();
        $parentFolder = Folder::getByPath('/sync');
        if (!$parentFolder) {
            throw new \RuntimeException('Thư mục /sync không tồn tại.');
        }
        $queue->setKey(uniqid('sync_')); // Bắt buộc có key
        $queue->setParent($parentFolder);
        $queue->setProduct($object);
        $queue->setStatus('pending');
        $queue->setPublished(true); // để hiện trong Admin và tránh lỗi ẩn object
        $queue->save();

    }
}
