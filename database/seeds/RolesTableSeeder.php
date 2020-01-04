<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Schema::disableForeignKeyConstraints();
    	Role::truncate();

        $superadmin = Role::create(['name' => 'Super Admin']);
        $admin = Role::create(['name' => 'Admin']);
        $editor = Role::create(['name' => 'Editor']);
        $customer = Role::create(['name' => 'Customer']);

        // First user as super admin
        $user1 = User::find(1);
        $user1->removeRole($superadmin);
        $user1->assignRole($superadmin);

        // Second user as admin
        $user2 = User::find(2);
        $user2->removeRole($admin);
        $user2->assignRole($admin);

        // Third user as editor
        $user3 = User::find(3);
        $user3->removeRole($editor);
        $user3->assignRole($editor);

        // Forth user as customer
        $user4 = User::find(4);
        $user4->removeRole($customer);
        $user4->assignRole($customer);
    }
}
