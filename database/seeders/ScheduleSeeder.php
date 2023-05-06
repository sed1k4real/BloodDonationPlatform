<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schedules')->insert([
            ['planing_id' => 1, 'date' => 6, 'dons_num' => 10],
            ['planing_id' => 1, 'date' => 7, 'dons_num' => 10],
        ]);
    }
}
