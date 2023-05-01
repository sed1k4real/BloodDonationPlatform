<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BloodCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('blood_categories')->insert([
            ['catg' => 'A', 'symbol' => 'A+', 'qty' => 0],
            ['catg' => 'B', 'symbol' => 'B+', 'qty' => 0],
            ['catg' => 'AB', 'symbol' => 'AB+', 'qty' => 0],
            ['catg' => 'O', 'symbol' => 'O+', 'qty' => 0],
            ['catg' => 'A', 'symbol' => 'A-', 'qty' => 0],
            ['catg' => 'B', 'symbol' => 'B-', 'qty' => 0],
            ['catg' => 'AB', 'symbol' => 'AB-', 'qty' => 0],
            ['catg' => 'O', 'symbol' => 'O-', 'qty' => 0],
        ]);
    }
}
