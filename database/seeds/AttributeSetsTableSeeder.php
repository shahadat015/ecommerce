<?php

use App\AttributeSet;
use Illuminate\Database\Seeder;

class AttributeSetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
    	AttributeSet::truncate();
    	
        AttributeSet::insert([
            [
	            'name' => 'Documents',
	            'slug' => 'documents'
	        ],
	        [
	            'name' => 'Features',
	            'slug' => 'features'
	        ],
	        [
	            'name' => 'Battery',
	            'slug' => 'battery'
	        ],
	        [
	            'name' => 'Comms',
	            'slug' => 'comms'
	        ],
	        [
	            'name' => 'Sound',
	            'slug' => 'sound'
	        ],
	        [
	            'name' => 'Selfie',
	            'slug' => 'selfie'
	        ],
	        [
	            'name' => 'Main',
	            'slug' => 'main'
	        ],
	        [
	            'name' => 'Memory',
	            'slug' => 'memory'
	        ],
	        [
	            'name' => 'Platform',
	            'slug' => 'platform'
	        ],
	        [
	            'name' => 'Display',
	            'slug' => 'display'
	        ],
	        [
	            'name' => 'Network',
	            'slug' => 'network'
	        ],
	        [
	            'name' => 'Specifications',
	            'slug' => 'specifications'
	        ]
        ]);
    }
}
