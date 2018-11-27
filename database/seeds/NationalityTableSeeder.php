<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NationalityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nationalities')->truncate();
        $json =  json_decode(file_get_contents(database_path('data/nationlities.json')));
        $sql = [];
        forEach($json as $item) {
            $sql[] = [
                'name' => $item->name
            ];
        }
        DB::table('nationalities')->insert($sql);
    }
}
