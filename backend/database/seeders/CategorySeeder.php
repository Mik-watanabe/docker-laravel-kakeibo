<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    const USER_NUM = 2;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = ['医療費', '食費', '雑費'];

        // デモユーザー二人の時
        for ($i = 1; $i <= self::USER_NUM; $i++) {
            foreach ($params as $param) {
                $categoryInfo = [
                    'user_id' => $i,
                    'name' =>$param
                ];
                DB::table('categories')->insert($categoryInfo);
            }
        }
    }
}
