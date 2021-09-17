<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class IncomeSeeder extends Seeder
{
    const USER_NUM = 2;
    const INCOME_SOURCE_NUM = 3;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < self::USER_NUM; $i++) {
            for($j = 1; $j <= self::INCOME_SOURCE_NUM; $j++) {
                $incomeInfo = [
                    'user_id' => $i + 1,
                    'income_source_id' => $j + (self::INCOME_SOURCE_NUM * $i),
                    'amount' => $faker->numberBetween(1000, 100000),
                    'accrual_date' => $faker->dateTimeBetween('-4year', 'now')
                ];
                DB::table('incomes')->insert($incomeInfo);
            }
        }
    }
}
