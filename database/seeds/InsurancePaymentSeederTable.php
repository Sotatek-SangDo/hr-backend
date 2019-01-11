<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class InsurancePaymentSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('insurance_payments')->truncate();
        $data = [];
        for($i = 1; $i < 5; $i++) {
            $data[] = [
                'title' => 'Đợt thanh đoán số '.$i,
                'time' => Carbon::parse('2017-01-'.$i)->format('Y-m-d'),
            ];
        }
        DB::table('insurance_payments')->insert($data);
    }
}
