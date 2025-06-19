<?php

namespace App\Factory;

use Elastic\Elasticsearch\Client;
use Elastic\Elasticsearch\ClientBuilder;

class ElasticsearchClientFactory
{
    public static function getClient(): Client
    {
        return ClientBuilder::create()
            ->setHosts([$_ENV['ELASTICSEARCH_HOST'] ?? 'http://elasticsearch:9200'])
            ->build();
    }
}
