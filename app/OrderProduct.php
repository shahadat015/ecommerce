<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
	protected $guarded = [];
	
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function options()
    {
        return $this->hasMany(OrderProductOption::class);
    }

    public function storeOptions($options)
    {
        $options->each(function ($option) {
            $orderProductOption = $this->options()->create([
                'order_product_id' => $this->id,
                'option_id' => $option->id,
            ]);

            $orderProductOption->storeValues($option->values);
        });
    }
}
