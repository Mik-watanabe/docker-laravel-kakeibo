<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class IncomeSourceSeeder extends Seeder
{
    const USER_NUM = 2;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = ['おこづかい', 'バイト代', 'お年玉'];

        // デモユーザー二人の時
        for ($i = 1; $i <= self::USER_NUM; $i++) {
            foreach ($params as $param) {
                $incomeSourceInfo = [
                    'user_id' => $i,
                    'name' =>$param
                ];
                DB::table('income_sources')->insert($incomeSourceInfo);
            }
        }
    }
}
