<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug', 'category_id', 'status'];

    public function subcategories()
    {
        return $this->hasMany(Category::class);
    }
}
