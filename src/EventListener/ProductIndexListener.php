<?php

namespace App\EventListener;

use Pimcore\Model\DataObject\Products;
use Pimcore\Event\DataObjectEvents;
use Pimcore\Event\Model\DataObjectEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use App\Services\ProductIndexer;

class ProductIndexListener implements EventSubscriberInterface
{
    public function __construct(private ProductIndexer $indexer) {}

    public static function getSubscribedEvents(): array
    {
        return [
            DataObjectEvents::POST_ADD => 'onSave',
            DataObjectEvents::POST_UPDATE => 'onSave',
            DataObjectEvents::PRE_DELETE => 'onDelete',
        ];
    }

    public function onSave(DataObjectEvent $event): void
    {
        $object = $event->getObject();
        if ($object instanceof Products && $object->getPublished()) {
            $this->indexer->indexProduct($object);
        }
    }

    public function onDelete(DataObjectEvent $event): void
    {
        $object = $event->getObject();
        if ($object instanceof Products) {
            $this->indexer->deleteFromIndex($object);
        }
    }
}
