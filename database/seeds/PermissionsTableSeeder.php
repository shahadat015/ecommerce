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
	            'name' => 'Create Product',
                'guard_name' => 'web'
	        ],
            [
                'name' => 'View Product',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Update Product',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Delete Product',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Create Category',
                'guard_name' => 'web'
            ],
            [
                'name' => 'View Category',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Update Category',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Delete Category',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Create Brand',
                'guard_name' => 'web'
            ],
            [
                'name' => 'View Brand',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Update Brand',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Delete Brand',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Create User',
                'guard_name' => 'web'
            ],
            [
                'name' => 'View User',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Update User',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Delete User',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Create Role',
                'guard_name' => 'web'
            ],
            [
                'name' => 'View Role',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Update Role',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Delete Role',
                'guard_name' => 'web'
            ],
            [
                'name' => 'View Subscriber',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Delete Subscriber',
                'guard_name' => 'web'
            ],
            [
                'name' => 'View Order',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Delete Order',
                'guard_name' => 'web'
            ],
            [
                'name' => 'View Message',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Delete Message',
                'guard_name' => 'web'
            ]
        ]);

        $admin = Role::find(2);
        $admin->revokePermissionTo(Permission::all());
        $admin->givePermissionTo(Permission::all());

        $editor = Role::find(3);
        $editor->revokePermissionTo(['Create Product', 'View Product', 'Update Product', 'Delete Product', 'Create Category', 'View Category', 'Update Category', 'Delete Category', 'Create Brand', 'View Brand', 'Update Brand', 'Delete Brand', 'View Subscriber', 'Delete Subscriber', 'View Order', 'Delete Order', 'View Message', 'Delete Message']);
        $editor->givePermissionTo(['Create Product', 'View Product', 'Update Product', 'Delete Product', 'Create Category', 'View Category', 'Update Category', 'Delete Category', 'Create Brand', 'View Brand', 'Update Brand', 'Delete Brand', 'View Subscriber', 'Delete Subscriber', 'View Order', 'Delete Order', 'View Message', 'Delete Message']);
        
    }
}