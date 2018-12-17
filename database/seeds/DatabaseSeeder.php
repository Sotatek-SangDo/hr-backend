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
        $this->call(SkillTableSeeder::class);
        $this->call(CompanyTableSeeder::class);
        $this->call(DepartmentsTableSeeder::class);
        $this->call(QualificationsSeeder::class);
        $this->call(CertificationSeeder::class);
    }
}
