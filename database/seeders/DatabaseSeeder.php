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
    public function run()
    {
        $this->call(BloodCategorySeeder::class);
        $this->call(GenderSeeder::class);
        $this->call(RoleSeeder::class);
    }
}
