<?php

use Illuminate\Database\Seeder;

class JobTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hr_jobs')->truncate();

        $json = json_decode(file_get_contents(database_path('data/jobs.json')));
        $data = [];
        forEach($json as $item) {
            $data[] = [
                'title' => $item->title
            ];
        }
        DB::table('hr_jobs')->insert($data);
    }
}
