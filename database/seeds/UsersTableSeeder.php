<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Schema::disableForeignKeyConstraints();
    	
        User::truncate();
        User::insert([
            [
                'name' => 'Shahadat Hossain',
                'email' => 'shahadat015@gmail.com',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'Rayhan Chowdhury',
                'email' => 'rayhan@gmail.com',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'Ratan Chowdhury',
                'email' => 'ratan@gmail.com',
                'password' => bcrypt('12345678'),
            ]
        ]);
    }
}
