<?php

namespace App\Command;

use App\Services\ProductIndexer;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ProductIndexCommand extends Command
{
    protected static $defaultName = 'app:product:index';

    public function __construct(private ProductIndexer $indexer)
    {
        parent::__construct();
    }

    protected function configure()
    {
        $this->setDescription('Index all products');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->indexer->indexAll();
        $output->writeln('✅ Sản phẩm đã được index vào Elasticsearch');
        return Command::SUCCESS;
    }
}
