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
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        //Add or Create permission into database
        // post
        $permission = Permission::create(['name' => 'add post']);
        $permission = Permission::create(['name' => 'edit post']);
        $permission = Permission::create(['name' => 'delete post']);
        $permission = Permission::create(['name' => 'publish']);
        $permission = Permission::create(['name' => 'revoke']);

        // Category
        $permission = Permission::create(['name' => 'add category']);
        $permission = Permission::create(['name' => 'edit category']);
        $permission = Permission::create(['name' => 'delete category']);

        //Add or Create role and assigned permission into database
        $role = Role::create([
            'name' => 'administrator'
        ])->syncPermissions(Permission::all());

        $role = Role::create([
            'name' => 'editor'
        ])->syncPermissions(['add post', 'edit post', 'publish', 'revoke', 'add category', 'edit category']);

        $role = Role::create([
            'name' => 'reporter'
        ])->syncPermissions(['add post', 'edit post','add category', 'edit category']);
    }
}
