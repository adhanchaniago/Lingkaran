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
        $permission = Permission::create(['name' => 'publish post']);
        $permission = Permission::create(['name' => 'revoke post']);

        // Category
        $permission = Permission::create(['name' => 'add category']);
        $permission = Permission::create(['name' => 'edit category']);
        $permission = Permission::create(['name' => 'delete category']);

        // Tag
        $permission = Permission::create(['name' => 'add tag']);
        $permission = Permission::create(['name' => 'edit tag']);
        $permission = Permission::create(['name' => 'delete tag']);

        // Headline
        $permission = Permission::create(['name' => 'add headline']);
        $permission = Permission::create(['name' => 'delete headline']);
        
        //Add or Create role and assigned permission into database
        $role = Role::create([
            'name' => 'Administrator'
        ])->syncPermissions(Permission::all());

        $role = Role::create([
            'name' => 'Editor'
        ])->syncPermissions(['add post', 'edit post', 'delete post','publish post', 'revoke post', 'add category', 'edit category', 'delete category', 'add tag', 'edit tag', 'delete tag', 'add headline', 'delete headline']);

        $role = Role::create([
            'name' => 'Reporter'
        ])->syncPermissions(['add post', 'edit post','add category', 'edit category', 'add tag', 'edit tag', 'delete tag']);
    }
}
