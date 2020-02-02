<?php

use App\OptionValue;
use Illuminate\Database\Seeder;

class OptionValuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
    	OptionValue::truncate();
    	
        OptionValue::insert([
            [
                'option_id' => 1,
                'label' => 'S',
            ],
            [
                'option_id' => 1,
                'label' => 'M',
            ],
            [
                'option_id' => 1,
                'label' => 'L',
            ],
            [
                'option_id' => 1,
                'label' => 'XL',
            ],
            [
                'option_id' => 1,
                'label' => 'XXL',
            ],
            [
                'option_id' => 2,
                'label' => 'Black',
            ],
            [
                'option_id' => 2,
                'label' => 'Silver',
            ],
            [
                'option_id' => 2,
                'label' => 'Brown',
            ],
            [
                'option_id' => 2,
                'label' => 'Gold',
            ],
            [
                'option_id' => 2,
                'label' => 'White',
            ]
        ]);
    }
}
