<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('stocks')->truncate();

        for ($i = 0; $i < 10; $i++) {
            DB::table('stocks')->insert([
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
