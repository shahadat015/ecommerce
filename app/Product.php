<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'slug', 'price', 'special_price', 'special_price_start', 'special_price_end', 'description', 'short_description', 'sku', 'manage_stock', 'qty', 'in_stock', 'viewed', 'new_from', 'new_to', 'status'];

    public function images()
    {
        return $this->morphToMany(Image::class, 'imageable');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories');
    }

    public function attributes()
    {
        return $this->hasMany(ProductAttribute::class);
    }

    public function options()
    {
        return $this->belongsToMany(Option::class, 'product_options');
    }

    public function metadata()
    {
        return $this->morphOne(MetaData::class, 'metaable');
    }

    public static function laratablesStatus($product)
    {
        if ($product->status) {
            return '<span class="badge badge-soft-info">Active</span>';
        }else{
            return '<span class="badge badge-soft-warning">Inactive</span>';
        }
    }

    // public static function laratablesImageid($product)
    // {
    //     if ($product->image) {
    //         return '<img src="'. asset($product->image->path()) .'" class="mr-2" alt="" height="52">';
    //     }else{
    //         return '<img src="'. asset('contents/admin/images/placeholder.png') .'" class="mr-2" alt="" height="52" width="80">';
    //     }
    // }

    public static function laratablesCustomAction($action)
    {
        $route  = $action->getTable();
        return view('layouts.partials.actions', compact('action', 'route'))->render();
    }
}
