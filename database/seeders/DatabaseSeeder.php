<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call(OrderSeeder::class);
        $this->call(RevenueSeeder::class);
        $this->call(SaleSeeder::class);
        $this->call(StockSeeder::class);
    }
}
