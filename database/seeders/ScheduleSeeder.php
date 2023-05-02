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
            ['plan_ref' => 1, 'date' => 6, 'dons_num' => 10],
            ['plan_ref' => 1, 'date' => 7, 'dons_num' => 10],
        ]);
    }
}
