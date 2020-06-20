<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Add or Create role into database
        $role = Role::create([
            'name' => 'administrator'
        ]);
        $role = Role::create([
            'name' => 'editor'
        ]);
        $role = Role::create([
            'name' => 'reporter'
        ]);

        //Add or Create permission into database
        $permission = Permission::create(['name' => 'add']);
        $permission = Permission::create(['name' => 'edit']);
        $permission = Permission::create(['name' => 'delete']);
        $permission = Permission::create(['name' => 'publish']);
        $permission = Permission::create(['name' => 'revoke']);
    }
}
