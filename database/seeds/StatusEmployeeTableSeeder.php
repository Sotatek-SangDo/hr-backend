<?php

use Illuminate\Database\Seeder;

class StatusEmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_emp')->truncate();

        $json = json_decode(file_get_contents(database_path('data/status.json')));
        $data = [];
        forEach($json as $item) {
            $data[] = [
                'status' => $item->status
            ];
        }
        DB::table('status_emp')->insert($data);
    }
}
