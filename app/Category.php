<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TypiCMS\NestableTrait;

class Category extends Model
{
	use NestableTrait;

    protected $fillable = ['name', 'slug', 'parent_id', 'status'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_categories');
    }
}
