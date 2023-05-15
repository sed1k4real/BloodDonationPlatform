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
            ['category' => 'blood', 'symbol' => 'A+', 'qty' => 0],
            ['category' => 'blood', 'symbol' => 'B+', 'qty' => 0],
            ['category' => 'blood', 'symbol' => 'AB+', 'qty' => 0],
            ['category' => 'blood', 'symbol' => 'O+', 'qty' => 0],
            ['category' => 'blood', 'symbol' => 'A-', 'qty' => 0],
            ['category' => 'blood', 'symbol' => 'B-', 'qty' => 0],
            ['category' => 'blood', 'symbol' => 'AB-', 'qty' => 0],
            ['category' => 'blood', 'symbol' => 'O-', 'qty' => 0],
            ['category' => 'platelet', 'symbol' => 'A+', 'qty' => 0],
            ['category' => 'platelet', 'symbol' => 'B+', 'qty' => 0],
            ['category' => 'platelet', 'symbol' => 'AB+', 'qty' => 0],
            ['category' => 'platelet', 'symbol' => 'O+', 'qty' => 0],
            ['category' => 'platelet', 'symbol' => 'A-', 'qty' => 0],
            ['category' => 'platelet', 'symbol' => 'B-', 'qty' => 0],
            ['category' => 'platelet', 'symbol' => 'AB-', 'qty' => 0],
            ['category' => 'platelet', 'symbol' => 'O-', 'qty' => 0],
        ]);
    }
}
