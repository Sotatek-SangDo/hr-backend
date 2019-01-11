<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class InsuranceSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('insurances')->truncate();
        $data = [];
        for($i = 1; $i < 3; $i++) {
            $data[] = [
                'emp_id' => $i,
                'num_social_security' => '0112207429',
                'num_health_insurance' => 'DN7015223100304',
                'place_registration_medical' => 'Bệnh viện 108',
                'salary_paid' => '2500000',
                'started_at' => Carbon::parse('2017-01-01')->format('Y-m-d'),
                'status' => 'Đang tham gia'
            ];
        }
        DB::table('insurances')->insert($data);
    }
}
