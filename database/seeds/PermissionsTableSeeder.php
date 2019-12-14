<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Schema::disableForeignKeyConstraints();
    	Permission::truncate();

    	Permission::insert([
        	[
	            'name' => 'CRUD PRODUCT',
                'guard_name' => 'web'
	        ],
            [
                'name' => 'CRUD CATEGORY',
                'guard_name' => 'web'
            ],
            [
                'name' => 'CRUD BRAND',
                'guard_name' => 'web'
            ],
            [
                'name' => 'CRUD USER',
                'guard_name' => 'web'
            ],
            [
                'name' => 'CRUD ROLE',
                'guard_name' => 'web'
            ],
            [
                'name' => 'RD SUBSCRIBER',
                'guard_name' => 'web'
            ],
            [
                'name' => 'RD ORDER',
                'guard_name' => 'web'
            ],
            [
                'name' => 'RD MESSAGE',
                'guard_name' => 'web'
            ]
        ]);

        $admin = Role::find(2);
        $admin->revokePermissionTo(Permission::all());
        $admin->givePermissionTo(Permission::all());

        $editor = Role::find(3);
        $editor->revokePermissionTo(['CRUD PRODUCT', 'CRUD CATEGORY', 'CRUD BRAND', 'RD SUBSCRIBER', 'RD ORDER', 'RD MESSAGE']);
        $editor->givePermissionTo(['CRUD PRODUCT', 'CRUD CATEGORY', 'CRUD BRAND', 'RD SUBSCRIBER', 'RD ORDER', 'RD MESSAGE']);
        
    }
}