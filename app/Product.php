<?php

namespace App;

use App\Http\Traits\ActivityLog;
use App\Option;
use App\ProductAttribute;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use ActivityLog;
    
    protected $fillable = ['name', 'qr_code', 'slug', 'image', 'brand_id', 'price', 'special_price', 'special_price_start', 'special_price_end', 'description', 'short_description', 'sku', 'manage_stock', 'qty', 'in_stock', 'viewed', 'new_from', 'new_to', 'status'];

    public function images()
    {
        return $this->morphToMany(Image::class, 'imageable');
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

    public function reviews()
    {
        return $this->hasMany(Review::class)->where('status', 1);
    }

    public function options()
    {
        return $this->belongsToMany(Option::class, 'product_options');
    }

    public function metadata()
    {
        return $this->morphOne(MetaData::class, 'metaable');
    }

    public function saveMetaData($request)
    {
        if($this->metadata){
            $this->metadata()->update([
                'meta_title' => $request->meta_title,
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description,
            ]);
        }else{
            if($request->meta_title){
                $this->metadata()->create([
                    'meta_title' => $request->meta_title,
                    'meta_keywords' => $request->meta_keywords,
                    'meta_description' => $request->meta_description,
                ]);
            }
        }
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
        $this->saveMetaData($request);
        $this->saveAttributes($request->attribute);
        $this->saveOptions($request->options); 
    }

    public function saveAttributes($attributes = [])
    {
        if($attributes[0]['attribute_id']){
            if($this->attributes){
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
    }

    public function saveOptions($options = [])
    {

        if($options[0]['name']){

            $productOptions = [];

            foreach ($options as $option) {
                $productOption = Option::updateOrCreate([
                    'name' => $option['name'],
                    'type' => $option['type'],
                    'is_required' => $option['is_required']
                ]);

                $productOption->values()->delete();

                $productOption->values()->createMany($option['values']);

                array_push($productOptions, $productOption->id);
            }

            $this->options()->sync($productOptions);
        }
    }

    public function ScopeInStock($query)
    {
        return $query->where('in_stock', 1);
    }

    function scopePublished($query){
        return $query->where('status', 1);
    }

    public function getSellingPrice()
    {
        if ($this->hasSpecialPrice()) {
            return $this->special_price;
        }

        return $this->price;
    }

    public function hasSpecialPrice()
    {
        if (is_null($this->special_price)) {
            return false;
        }

        if ($this->hasSpecialPriceStartDate() && $this->hasSpecialPriceEndDate()) {
            return $this->specialPriceStartDateIsValid() && $this->specialPriceEndDateIsValid();
        }

        if ($this->hasSpecialPriceStartDate()) {
            return $this->specialPriceStartDateIsValid();
        }

        if ($this->hasSpecialPriceEndDate()) {
            return $this->specialPriceEndDateIsValid();
        }

        return true;
    }

    private function hasSpecialPriceStartDate()
    {
        return ! is_null($this->special_price_start);
    }

    private function hasSpecialPriceEndDate()
    {
        return ! is_null($this->special_price_end);
    }

    private function specialPriceStartDateIsValid()
    {
        return today() >= $this->special_price_start;
    }

    private function specialPriceEndDateIsValid()
    {
        return today() <= $this->special_price_end;
    }

    public static function laratablesStatus($product)
    {
        if ($product->status) {
            return '<span class="badge badge-soft-info">Active</span>';
        }else{
            return '<span class="badge badge-soft-warning">Inactive</span>';
        }
    }

    public static function laratablesImage($product)
    {
        if ($product->image) {
            return '<img src="'. asset($product->image) .'" class="mr-2" alt="" height="52">';
        }else{
            return '<img src="'. asset('contents/admin/images/placeholder.png') .'" class="mr-2" alt="" height="52" width="80">';
        }
    }

    public static function laratablesCustomAction($action)
    {
        return view('layouts.partials.actions')->with(['action' => $action, 'route' => $action->getTable(), 'switch' => 'true'])->render();
    }
}
