<?php

use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('group_permissions')->truncate();

        $json = json_decode(file_get_contents(database_path('data/permissions.json')));
        $data = [];
        forEach($json as $item) {
            $data[] = [
                'role' => $item->roles,
                'permissions' => json_encode($item->permissions)
            ];
        }
        DB::table('group_permissions')->insert($data);
    }
}
