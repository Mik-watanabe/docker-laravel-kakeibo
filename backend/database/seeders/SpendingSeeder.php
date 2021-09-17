<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpendingSeeder extends Seeder
{
    const USER_NUM = 2;
    const CATEGORY_NUM = 3;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['怪我', '焼肉', '靴'];
        $faker = Faker::create();

        for ($i = 0; $i < self::USER_NUM; $i++) {
            for($j = 1; $j <= self::CATEGORY_NUM; $j++) {
                $spendingInfo = [
                    'user_id' => $i + 1,
                    'category_id' => $j  + (self::CATEGORY_NUM * $i),
                    'name' => $names[$j - 1],
                    'amount' => $faker->numberBetween(1000, 100000),
                    'accrual_date' => $faker->dateTimeBetween('-4year', 'now')
                ];
                DB::table('spendings')->insert($spendingInfo);
            }
        }
    }
}
