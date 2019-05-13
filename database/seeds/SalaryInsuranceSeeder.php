<?php

use Illuminate\Database\Seeder;

class SalaryInsuranceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('salary_insurances')->truncate();

        $json = json_decode(file_get_contents(database_path('data/salaryInsurances.json')));
        $data = [];
        forEach($json as $item) {
            $data[] = [
                'salary' => $item->salary,
                'insurance' => $item->insurance,
                'percent' => $item->percent,
            ];
        }
        DB::table('salary_insurances')->insert($data);
    }
}
