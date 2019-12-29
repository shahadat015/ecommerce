<?php

use App\Brand;
use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
    	Brand::truncate();
    	
        Brand::insert([
            [
	            'name' => 'Apple',
	            'slug' => 'apple'
	        ],
            [
	            'name' => 'Samsung',
	            'slug' => 'samsung'
	        ],
            [
	            'name' => 'Hp',
	            'slug' => 'hp'
	        ],
            [
	            'name' => 'Colors',
	            'slug' => 'colors'
	        ],
            [
	            'name' => 'Easy',
	            'slug' => 'easy'
	        ],
            [
	            'name' => 'Bata',
	            'slug' => 'bata'
	        ],
            [
	            'name' => 'Apex',
	            'slug' => 'apex'
	        ]
        ]);
    }
}
