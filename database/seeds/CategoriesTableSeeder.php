<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Schema::disableForeignKeyConstraints();
    	Category::truncate();
    	
        Category::insert([
            [
                'parent_id' => NULL,
                'name' => 'Mens',
                'slug' => 'mens'
            ],
            [
                'parent_id' => NULL,
	            'name' => 'Womens',
	            'slug' => 'womens'
	        ],
            [
                'parent_id' => NULL,
                'name' => 'Kids',
                'slug' => 'kids'
            ],
            [
                'parent_id' => NULL,
	            'name' => 'Eletronics',
	            'slug' => 'eletronics'
	        ],
            [
                'parent_id' => NULL,
                'name' => 'Accessories',
                'slug' => 'accessories'
            ],
            [
                'parent_id' => NULL,
	            'name' => 'Home Appliance',
	            'slug' => 'home appliance'
	        ],
            [
	            'parent_id' => '1',
	            'name' => 'Shirt',
	            'slug' => 'shirt'
	        ],
            [
	            'parent_id' => '1',
	            'name' => 'Pant',
	            'slug' => 'pant'
	        ],
            [
                'parent_id' => '1',
                'name' => 'Panjabi',
                'slug' => 'panjabi'
            ],
            [
                'parent_id' => '2',
                'name' => 'Shari',
                'slug' => 'shari'
            ],
            [
                'parent_id' => '3',
                'name' => 'Toys',
                'slug' => 'toys'
            ],
            [
                'parent_id' => '4',
                'name' => 'Light',
                'slug' => 'light'
            ],
            [
                'parent_id' => '4',
                'name' => 'Fan',
                'slug' => 'fan'
            ]
        ]);
    }
}
