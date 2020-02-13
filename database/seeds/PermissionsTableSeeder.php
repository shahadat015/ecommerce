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
                'name' => 'View Message',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Delete Message',
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
                'name' => 'View Visitor',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Delete Visitor',
                'guard_name' => 'web'
            ],
            [
                'name' => 'View Activity Log',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Delete Activity Log',
                'guard_name' => 'web'
            ],
            [
                'name' => 'View Settings',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Update Settings',
                'guard_name' => 'web'
            ],
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
                'name' => 'Create Feature',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Update Feature',
                'guard_name' => 'web'
            ],
            [
                'name' => 'View Feature',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Delete Feature',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Create Option',
                'guard_name' => 'web'
            ],
            [
                'name' => 'View Option',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Delete Option',
                'guard_name' => 'web'
            ],
            [
                'name' => 'View Review',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Update Review',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Delete Review',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Create Coupon',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Update Coupon',
                'guard_name' => 'web'
            ],
            [
                'name' => 'View Coupon',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Delete Coupon',
                'guard_name' => 'web'
            ],
            [
                'name' => 'View Media',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Delete Media',
                'guard_name' => 'web'
            ],
            [
                'name' => 'View Report',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Create Menu',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Update Menu',
                'guard_name' => 'web'
            ],
            [
                'name' => 'View Menu',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Delete Menu',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Create Slider',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Update Slider',
                'guard_name' => 'web'
            ],
            [
                'name' => 'View Slider',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Delete Slider',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Create Page',
                'guard_name' => 'web'
            ],[
                'name' => 'View Page',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Update Page',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Delete Page',
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
                'name' => 'View Transaction',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Delete Transaction',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Create Customer',
                'guard_name' => 'web'
            ],
            [
                'name' => 'View Customer',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Update Customer',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Delete Customer',
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
        ]);

        $admin = Role::find(2);
        $admin->revokePermissionTo(Permission::all());
        $admin->givePermissionTo(Permission::all());

        $editor = Role::find(3);
        $editor->revokePermissionTo([ 'View Message', 'Delete Message', 'View Subscriber', 'Delete Subscriber', 'View Visitor', 'Delete Visitor', 'View Settings', 'Update Settings', 'Create Product', 'View Product', 'Update Product', 'Delete Product', 'Create Category', 'View Category', 'Update Category', 'Delete Category', 'Create Brand', 'View Brand', 'Update Brand', 'Delete Brand', 'Create Feature', 'Update Feature', 'View Feature', 'Delete Feature', 'Create Option', 'View Option', 'Delete Option', 'View Review', 'Update Review', 'Delete Review', 'Create Coupon', 'View Coupon', 'Update Coupon', 'Delete Coupon', 'View Media', 'Delete Media', 'View Report', 'Create Menu', 'Update Menu', 'View Menu', 'Delete Menu', 'Create Slider', 'Update Slider', 'View Slider', 'Delete Slider', 'Create Page', 'View Page', 'Update Page', 'Delete Page', 'View Order', 'Delete Order', 'View Transaction', 'Delete Transaction', 'Create Customer', 'View Customer', 'Update Customer', 'Delete Customer']);
        $editor->givePermissionTo([ 'View Message', 'Delete Message', 'View Subscriber', 'Delete Subscriber', 'View Visitor', 'Delete Visitor', 'View Settings', 'Update Settings', 'Create Product', 'View Product', 'Update Product', 'Delete Product', 'Create Category', 'View Category', 'Update Category', 'Delete Category', 'Create Brand', 'View Brand', 'Update Brand', 'Delete Brand', 'Create Feature', 'Update Feature', 'View Feature', 'Delete Feature', 'Create Option', 'View Option', 'Delete Option', 'View Review', 'Update Review', 'Delete Review', 'Create Coupon', 'View Coupon', 'Update Coupon', 'Delete Coupon', 'View Media', 'Delete Media', 'View Report', 'Create Menu', 'Update Menu', 'View Menu', 'Delete Menu', 'Create Slider', 'Update Slider', 'View Slider', 'Delete Slider', 'Create Page', 'View Page', 'Update Page', 'Delete Page', 'View Order', 'Delete Order', 'View Transaction', 'Delete Transaction', 'Create Customer', 'View Customer', 'Update Customer', 'Delete Customer' ]);
        
    }
}