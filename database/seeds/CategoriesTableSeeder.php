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
                'category_id' => NULL,
                'name' => 'Mens',
                'slug' => 'mens'
            ],
            [
                'category_id' => NULL,
	            'name' => 'Womens',
	            'slug' => 'womens'
	        ],
            [
                'category_id' => NULL,
                'name' => 'Kids',
                'slug' => 'kids'
            ],
            [
                'category_id' => NULL,
	            'name' => 'Eletronics',
	            'slug' => 'eletronics'
	        ],
            [
                'category_id' => NULL,
                'name' => 'Accessories',
                'slug' => 'accessories'
            ],
            [
                'category_id' => NULL,
	            'name' => 'Home Appliance',
	            'slug' => 'home appliance'
	        ],
            [
	            'category_id' => '1',
	            'name' => 'Shirt',
	            'slug' => 'shirt'
	        ],
            [
	            'category_id' => '1',
	            'name' => 'Pant',
	            'slug' => 'pant'
	        ],
            [
                'category_id' => '1',
                'name' => 'Panjabi',
                'slug' => 'panjabi'
            ],
            [
                'category_id' => '2',
                'name' => 'Shari',
                'slug' => 'shari'
            ],
            [
                'category_id' => '3',
                'name' => 'Toys',
                'slug' => 'toys'
            ],
            [
                'category_id' => '4',
                'name' => 'Light',
                'slug' => 'light'
            ],
            [
                'category_id' => '4',
                'name' => 'Fan',
                'slug' => 'fan'
            ]
        ]);
    }
}
