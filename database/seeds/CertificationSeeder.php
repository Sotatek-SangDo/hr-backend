<?php

use Illuminate\Database\Seeder;

class CertificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('certifications')->truncate();

        $json = json_decode(file_get_contents(database_path('data/certifications.json')));
        $data = [];
        forEach($json as $item) {
            $data[] = [
                'name' => $item->name
            ];
        }
        DB::table('certifications')->insert($data);
    }
}
