<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions_router')->truncate();

        $json = json_decode(file_get_contents(database_path('data/permission.json')));
        $data = [];
        forEach($json as $item) {
            $data[] = [
                'role' => $item->roles,
                'gr_permissions' => is_array($item->permissions)
                    ? json_encode($item->permissions)
                    : $item->permissions,
                'priority' => $item->priority
            ];
        }
        DB::table('permissions_router')->insert($data);
    }
}
