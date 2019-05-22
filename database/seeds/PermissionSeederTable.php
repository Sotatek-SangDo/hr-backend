<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class PermissionSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('permissions')->truncate();
        DB::table('roles')->truncate();
        Schema::enableForeignKeyConstraints();
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        // create permissions
        Permission::create(['name' => 'view employee']);
        Permission::create(['name' => 'create employee']);
        Permission::create(['name' => 'update employee']);
        Permission::create(['name' => 'delete employee']);
        Permission::create(['name' => 'view insurance']);
        Permission::create(['name' => 'create insurance']);
        Permission::create(['name' => 'update insurance']);
        Permission::create(['name' => 'delete insurance']);
        Permission::create(['name' => 'view insurance payment']);
        Permission::create(['name' => 'create insurance payment']);
        Permission::create(['name' => 'delete insurance payment']);
        Permission::create(['name' => 'view recruitment']);
        Permission::create(['name' => 'create recruitment']);
        Permission::create(['name' => 'update recruitment']);
        Permission::create(['name' => 'delete recruitment']);
        Permission::create(['name' => 'view candidate']);
        Permission::create(['name' => 'create interview']);
        Permission::create(['name' => 'update candidate']);
        Permission::create(['name' => 'delete candidate']);
        Permission::create(['name' => 'view interview']);
        Permission::create(['name' => 'update interview']);
        Permission::create(['name' => 'delete interview']);
        Permission::create(['name' => 'create user']);
        Permission::create(['name' => 'update user']);
        Permission::create(['name' => 'delete user']);
        // create roles and assign created permissions
        // or may be done by chaining
        $role = Role::create(['name' => 'author'])
            ->givePermissionTo([
                'view employee',
                'create employee',
                'view insurance',
                'view insurance payment',
                'view recruitment',
                'view candidate'
            ]);

        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(Permission::all());
    }
}
