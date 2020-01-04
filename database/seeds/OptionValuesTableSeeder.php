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
                'label' => '7 US',
            ],
            [
                'option_id' => 1,
                'label' => '8.5 US',
            ],
            [
                'option_id' => 1,
                'label' => '9.5 US',
            ],
            [
                'option_id' => 1,
                'label' => '10 US',
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
                'option_id' => 3,
                'label' => 'Black',
            ],
            [
                'option_id' => 3,
                'label' => 'Silver',
            ],
            [
                'option_id' => 3,
                'label' => 'Gold',
            ],
            [
                'option_id' => 3,
                'label' => 'Brown',
            ]
        ]);
    }
}
