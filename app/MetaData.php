<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MetaData extends Model
{
    protected $fillable = ['meta_title', 'meta_keywords', 'meta_description'];
}
