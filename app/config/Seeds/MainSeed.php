<?php
use Migrations\AbstractSeed;

class MainSeed extends AbstractSeed
{
    public function run(): void
    {
        $this->call('UsersSeed');
        $this->call('ArticlesSeed');
    }
}
