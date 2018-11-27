<?php

use Illuminate\Database\Seeder;

class PayGradeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pay_grade')->truncate();

        $json = json_decode(file_get_contents(database_path('data/paygrade.json')));
        $data = [];
        forEach($json as $item) {
            $data[] = [
                'title' => $item->title,
                'salary' => $item->salary
            ];
        }
        DB::table('pay_grade')->insert($data);
    }
}
