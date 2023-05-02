<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlaningSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('planings')->insert([
            ['month' => 05, 'year' => 2023, 'status' => 'active'],
            ['month' => 06, 'year' => 2023, 'status' => 'active'],
            ['month' => 07, 'year' => 2023, 'status' => 'active'],
        ]);
    }
}
