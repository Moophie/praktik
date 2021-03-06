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
        // Call all the other seeders
        $this->call(UsersSeeder::class);
        $this->call(CompaniesSeeder::class);
        $this->call(ReviewsSeeder::class);
        $this->call(JobsSeeder::class);
        $this->call(StationsSeeder::class);
        $this->call(ApplicationsSeeder::class);
        $this->call(LabelsSeeder::class);
    }
}
