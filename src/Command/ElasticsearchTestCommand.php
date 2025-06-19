<?php

namespace App\Command;

use Elastic\Elasticsearch\Client;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ElasticsearchTestCommand extends Command
{
    protected static $defaultName = 'app:elasticsearch:test';

    public function __construct(private Client $client)
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $info = $this->client->info();
        $output->writeln('Connected to: ' . $info['cluster_name']);
        $output->writeln('Version: ' . $info['version']['number']);

        return Command::SUCCESS;
    }
}
