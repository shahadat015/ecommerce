<?php

use App\Attribute;
use Illuminate\Database\Seeder;

class AttributesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
    	Attribute::truncate();
    	
        Attribute::insert([
            [
                'attribute_set_id' => 1,
                'name' => 'Documents',
                'slug' => 'documents'
            ],
            [
                'attribute_set_id' => 2,
	            'name' => 'Browser',
	            'slug' => 'browser'
	        ],
            [
                'attribute_set_id' => 2,
                'name' => 'Messaging',
                'slug' => 'messaging'
            ],
            [
                'attribute_set_id' => 3,
	            'name' => 'Battery',
	            'slug' => 'battery'
	        ],
            [
                'attribute_set_id' => 4,
                'name' => 'Radio',
                'slug' => 'radio'
            ],
            [
                'attribute_set_id' => 4,
	            'name' => 'GPS',
	            'slug' => 'gps'
	        ],
            [
	            'attribute_set_id' => '4',
	            'name' => 'Bluetooth',
	            'slug' => 'bluetooth'
	        ],
            [
	            'attribute_set_id' => '4',
	            'name' => 'WLAN',
	            'slug' => 'wlan'
	        ],
            [
                'attribute_set_id' => '5',
                'name' => '3.5mm',
                'slug' => '3.5mm'
            ],
            [
                'attribute_set_id' => '5',
                'name' => 'Loudspeaker',
                'slug' => 'loudspeaker'
            ]
        ]);
    }
}
