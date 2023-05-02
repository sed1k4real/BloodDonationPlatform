<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rooms')->insert([
            ['room_name' => 'Room 1'],
            ['room_name' => 'Room 2'],
            ['room_name' => 'Room 3'],
            ['room_name' => 'Room 4'],
            ['room_name' => 'Room 5'],
        ]);
    }
}
