<?php

namespace App\Command;

use App\Services\CategoryIndexer;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CategoryIndexCommand extends Command
{
    protected static $defaultName = 'app:category:index';

    public function __construct(private CategoryIndexer $indexer)
    {
        parent::__construct();
    }

    protected function configure()
    {
        $this->setDescription('Index all categories under /Product Data/Categories/danhmuc');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->indexer->indexAll();
        $output->writeln('✅ Danh mục đã được index vào Elasticsearch');
        return Command::SUCCESS;
    }
}
