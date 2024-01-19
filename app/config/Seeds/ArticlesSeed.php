<?php
use Cake\I18n\FrozenTime;
use Migrations\AbstractSeed;

class ArticlesSeed extends AbstractSeed
{
    public function run(): void
    {
        $now = FrozenTime::now()->i18nFormat('yyyy-MM-dd HH:mm:ss');

        $data = [
            [
                'user_id'      => 1,
                'title'        => 'Hello World',
                'slug'         => 'hello-world',
                'body'         => 'hello world, this post is ....',
                'published_at' => $now,
                'created_at'   => $now,
                'updated_at'   => $now
            ],
            [
                'user_id'      => 2,
                'title'        => 'Hello World2',
                'slug'         => 'hello-world2',
                'body'         => 'hello world, this post is ....',
                'published_at' => null,
                'created_at'   => $now,
                'updated_at'   => $now
            ]
        ];

        $articlesTable = $this->table('articles');
        $articlesTable->insert($data)->save();
    }
}
