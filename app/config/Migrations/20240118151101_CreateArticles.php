<?php
use Migrations\AbstractMigration;

class CreateArticles extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('articles');
        $table->addColumn('user_id', 'integer')
              ->addColumn('title', 'string', ['limit' => 255])
              ->addColumn('slug', 'string', ['limit' => 191])
              ->addColumn('body', 'text', ['null' => true])
              ->addColumn('published_at', 'datetime', ['null' => true])
              ->addColumn('created_at', 'datetime')
              ->addColumn('updated_at', 'datetime')
              ->addIndex(['slug'], ['unique' => true])
              ->addForeignKey('user_id', 'users', 'id', ['delete'=> 'CASCADE', 'update'=> 'NO_ACTION'])
              ->create();
    }
}
