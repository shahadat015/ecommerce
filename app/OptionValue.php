<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OptionValue extends Model
{
     protected $fillable = ['option_id', 'label', 'price', 'price_type'];
}
