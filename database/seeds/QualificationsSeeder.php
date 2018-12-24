<?php

use Illuminate\Database\Seeder;

class QualificationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('qualifications')->truncate();

        $json = json_decode(file_get_contents(database_path('data/qualifications.json')));
        $data = [];
        forEach($json as $item) {
            $data[] = [
                'name' => $item->name
            ];
        }
        DB::table('qualifications')->insert($data);
    }
}
