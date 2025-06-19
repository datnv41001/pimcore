<?php

namespace App\EventListener;

use Pimcore\Model\DataObject\Danhmuc;
use Pimcore\Event\DataObjectEvents;
use Pimcore\Event\Model\DataObjectEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use App\Services\CategoryIndexer;

class CategoryIndexListener implements EventSubscriberInterface
{
    public function __construct(private CategoryIndexer $indexer) {}

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
        if ($object instanceof Danhmuc && $object->getPublished()) {
            $this->indexer->indexCategory($object);
        }
    }

    public function onDelete(DataObjectEvent $event): void
    {
        $object = $event->getObject();
        if ($object instanceof Danhmuc) {
            $this->indexer->deleteFromIndex($object);
        }
    }
}
