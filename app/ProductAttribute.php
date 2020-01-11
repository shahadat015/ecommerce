<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
	protected $fillable = ['product_id', 'attribute_id'];

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }

    public function values()
    {
        return $this->belongsToMany(AttributeValue::class, 'product_attribute_values');
    }
}
