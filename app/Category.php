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

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public static function treeList()
    {
        return static::select('id', 'parent_id', 'name')
            ->orderBy('parent_id')
            ->get()
            ->nest()
            ->setIndent('¦–– ')
            ->listsFlattened('name');
    }
}
