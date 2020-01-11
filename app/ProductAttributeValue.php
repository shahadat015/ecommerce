<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductAttributeValue extends Model
{

    public function attributeValue()
    {
        return $this->belongsTo(AttributeValue::class, 'attribute_value_id');
    }
}
