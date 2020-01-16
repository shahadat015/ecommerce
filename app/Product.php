<?php

namespace App;

use App\Option;
use App\ProductAttribute;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'slug', 'image_id', 'brand_id', 'price', 'special_price', 'special_price_start', 'special_price_end', 'description', 'short_description', 'sku', 'manage_stock', 'qty', 'in_stock', 'viewed', 'new_from', 'new_to', 'status'];


    public function images()
    {
        return $this->morphToMany(Image::class, 'imageable');
    }

    public function image()
    {
        return $this->belongsTo(Image::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
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

    public function relatedProducts()
    {
        return $this->belongsToMany(static::class, 'related_products', 'product_id', 'related_product_id');
    }

    public function saveRelations($request)
    {
        $this->categories()->sync($request->categories);
        $this->relatedProducts()->sync($request->products);
        $this->images()->sync($request->images);
    }

    public function saveAttributes($attributes = [])
    {
    	if($this->attributes()){
    		$this->attributes()->delete();
    	}

        foreach ($attributes as $attribute) {
            $productAttribute = ProductAttribute::create([
                'attribute_id' => $attribute['attribute_id'],
                'product_id' => $this->id
            ]);
            $productAttribute->values()->sync($attribute['attribute_value_id']);
        }
    }

    public function saveOptions($options = [])
    {

        $productOptions = [];

     	foreach ($options as $option) {
            $productOption = Option::create([
                'name' => $option['name'],
                'type' => $option['type'],
                'is_required' => $option['is_required']
            ]);

            $productOption->values()->createMany($option['values']);

            array_push($productOptions, $productOption->id);
        }

        $this->options()->sync($productOptions);
    }

    public static function laratablesStatus($product)
    {
        if ($product->status) {
            return '<span class="badge badge-soft-info">Active</span>';
        }else{
            return '<span class="badge badge-soft-warning">Inactive</span>';
        }
    }

    public static function laratablesImagepath($product)
    {
        if ($product->image) {
            return '<img src="'. asset($product->image->path()) .'" class="mr-2" alt="" height="52">';
        }else{
            return '<img src="'. asset('contents/admin/images/placeholder.png') .'" class="mr-2" alt="" height="52" width="80">';
        }
    }

    public static function laratablesCustomAction($action)
    {
        $route  = $action->getTable();
        return view('layouts.partials.actions', compact('action', 'route'))->render();
    }
}
