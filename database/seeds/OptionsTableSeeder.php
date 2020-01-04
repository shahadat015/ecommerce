<?php

use App\Option;
use Illuminate\Database\Seeder;

class OptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
    	Option::truncate();
    	
        Option::insert([
            [
                'name' => 'Size Shows',
                'type' => 'radio'
            ],
            [
	            'name' => 'Color Checkbox',
	            'type' => 'checkbox'
	        ],
            [
                'name' => 'Color Multiple',
                'type' => 'multiple_select'
            ],
            [
	            'name' => 'Warranty Checkbox',
	            'type' => 'checkbox'
	        ],
            [
                'name' => 'Warranty Dropdown',
                'type' => 'dropdown'
            ],
            [
	            'name' => 'Size Dorpdown',
	            'type' => 'dropdown'
	        ],
            [
	            'name' => 'Color Dropdown',
	            'type' => 'dropdown'
	        ],
            [
	            'name' => 'Color Checkbox',
	            'type' => 'checkbox'
	        ],
            [
                'name' => 'Color Multiple',
                'type' => 'multiple_select'
            ],
            [
                'name' => 'Color Radio',
                'type' => 'radio'
            ]
        ]);
    }
}
