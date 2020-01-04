<?php

use App\AttributeValue;
use Illuminate\Database\Seeder;

class AttributeValuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
    	AttributeValue::truncate();
    	
        AttributeValue::insert([
            [
                'attribute_id' => 1,
                'value' => 'Warranty',
            ],
            [
                'attribute_id' => 2,
                'value' => 'HTML5',
            ],
            [
                'attribute_id' => 3,
                'value' => 'SMS, MMS, Email, Push Email, IM',
            ],
            [
                'attribute_id' => 4,
                'value' => 'Non-removable Li-Ion 3750 mAh battery',
            ],
            [
                'attribute_id' => 4,
                'value' => 'Non-removable Li-Ion 3400 mAh battery',
            ],
            [
                'attribute_id' => 5,
                'value' => 'Yesy',
            ],
            [
                'attribute_id' => 5,
                'value' => 'FM radio',
            ],
            [
                'attribute_id' => 5,
                'value' => 'No',
            ],
            [
                'attribute_id' => 6,
                'value' => 'Yes, with A-GPS, GLONASS, BDS',
            ],
            [
                'attribute_id' => 7,
                'value' => '5.0, A2DP, EDR, LE',
            ],
            [
                'attribute_id' => 8,
                'value' => 'Wi-Fi 802.11 a/b/g/n/ac, dual-band, WiFi Direct, hotspot',
            ],
            [
                'attribute_id' => 9,
                'value' => 'Yes',
            ]
        ]);
    }
}
