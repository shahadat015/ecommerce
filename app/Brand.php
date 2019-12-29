<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['name', 'slug', 'tagline', 'image_id', 'status'];

    public function image()
    {
        return $this->belongsTo(Image::class);
    }

    public function status()
    {
    	if ($this->status) {
    		return '<span class="badge badge-soft-info">Active</span>';
    	}else{
    		return '<span class="badge badge-soft-warning">Inactive</span>';
    	}
    }

    public static function laratablesStatus($brand)
    {
        if ($brand->status) {
            return '<span class="badge badge-soft-info">Active</span>';
        }else{
            return '<span class="badge badge-soft-warning">Inactive</span>';
        }
    }

    public static function laratablesName($brand)
    {
        if ($brand->image) {
            return '<img src="'. asset($brand->image->path()) .'" class="mr-2" alt="" height="52">';
        }else{
            return '<img src="'. asset('contents/admin/images/placeholder.png') .'" class="mr-2" alt="" height="52" width="80"> 
                    <p class="d-inline-block align-middle mb-0">
                        <a href="#" class="d-inline-block align-middle mb-0 product-name">' . $brand->name .'</a>
                        <br><span class="text-muted font-13"> '. $brand->tagline .' </span>
                    </p>';
        }
    }

    public static function laratablesCustomAction($action)
    {
        $route  = $action->getTable();
        return view('layouts.partials.actions', compact('action', 'route'))->render();
    }
}
