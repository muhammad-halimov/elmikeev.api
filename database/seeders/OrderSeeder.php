<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('orders')->truncate();

        for ($i = 0; $i < 10; $i++) {
            DB::table('orders')->insert([
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
