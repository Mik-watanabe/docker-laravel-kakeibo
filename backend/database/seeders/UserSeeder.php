<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 特定のユーザー
        $params = [
            [
                'name' => '家計簿Aさん',
                'email' => 'test@test.test',
                'email_verified_at' => now(),
                'password' => Hash::make('testtest'),
            ],
            [
                'name' => '家計簿Bさん',
                'email' => 'testB@test.test',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
            ]
        ];

        foreach ($params as $param) {
            DB::table('users')->insert($param);
        }
    }
}
