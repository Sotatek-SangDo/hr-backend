<?php

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
        $this->call(UserTableSeeder::class);
        $this->call(NationalityTableSeeder::class);
        $this->call(PayGradeTableSeeder::class);
        $this->call(JobTableSeeder::class);
        $this->call(StatusEmployeeTableSeeder::class);
    }
}
