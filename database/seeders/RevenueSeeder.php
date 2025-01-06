<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class RevenueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('revenue')->truncate();

        for ($i = 0; $i < 10; $i++) {
            DB::table('revenue')->insert([
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
