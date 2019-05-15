<?php

use Illuminate\Database\Seeder;

class RollTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rolls')->truncate();

        $json = json_decode(file_get_contents(database_path('data/rolls.json')));
        $data = [];
        forEach($json as $item) {
            $data[] = [
                'name' => $item->name
            ];
        }
        DB::table('rolls')->insert($data);
    }
}
