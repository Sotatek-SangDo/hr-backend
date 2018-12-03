<?php

use Illuminate\Database\Seeder;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('company')->truncate();
        DB::table('company')->insert([
        	'name' => 'HRM',
        	'email' => 'hrm@gmail.com',
        	'phone_number' => '123456789',
        	'address' => '68 Nguyễn Cơ Thạch, Từ Liêm, Hà nội'
        ]);
    }
}
