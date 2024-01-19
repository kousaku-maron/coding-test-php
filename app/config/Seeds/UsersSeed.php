<?php
use Cake\I18n\FrozenTime;
use Migrations\AbstractSeed;

class UsersSeed extends AbstractSeed
{
    public function run(): void
    {
        $now = FrozenTime::now()->i18nFormat('yyyy-MM-dd HH:mm:ss');

        $data = [
            [
                'id'         => 1,
                'email'      => 'hello@betamind.co.jp',
                'password'   => 'secret',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id'         => 2,
                'email'      => 'world@betamind.co.jp',
                'password'   => 'secret',
                'created_at' => $now,
                'updated_at' => $now
            ]
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
