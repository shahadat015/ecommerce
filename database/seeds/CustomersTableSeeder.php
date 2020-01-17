<?php

use App\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Schema::disableForeignKeyConstraints();
    	Customer::truncate();

        Customer::insert([
	        [
	            'name' => 'Saddam Hossain',
	            'email' => 'shahadat018@gmail.com',
	            'password' => bcrypt('12345678'),
	        ]
        ]);

    }
}
