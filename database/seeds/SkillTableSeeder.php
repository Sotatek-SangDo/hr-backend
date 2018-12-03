<?php

use Illuminate\Database\Seeder;

class SkillTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('skills')->truncate();

        $json = json_decode(file_get_contents(database_path('data/skills.json')));
        $data = [];
        forEach($json as $item) {
            $data[] = [
                'skill_name' => $item->name
            ];
        }
        DB::table('skills')->insert($data);
    }
}
