<?php

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->truncate();

        $json = json_decode(file_get_contents(database_path('data/departments.json')));
        $data = [];
        forEach($json as $item) {
            $data[] = [
                'name' => $item->name,
                'email' => $item->email,
                'phone_number' => $item->phone_number,
            ];
        }
        DB::table('departments')->insert($data);
    }
}
