<?php

use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->truncate();

        $json = json_decode(file_get_contents(database_path('data/languages.json')));
        $data = [];
        forEach($json as $item) {
            $data[] = [
                'title' => $item->title,
                'sign' => $item->sign
            ];
        }
        DB::table('languages')->insert($data);
    }
}
