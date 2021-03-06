<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProductOption extends Model
{
	protected $guarded = [];

    public function option()
    {
        return $this->belongsTo(Option::class);
    }

    public function values()
    {
        return $this->belongsToMany(OptionValue::class, 'order_product_option_values');
    }

    public function storeValues($values)
    {
        $values = $values->mapWithKeys(function ($value) {
            return [$value->id => [
                'price' => $value->price,
            ]];
        });

        $this->values()->attach($values->all());
    }
}
