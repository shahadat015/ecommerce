<?php

namespace App;

use App\Http\Traits\ActivityLog;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use ActivityLog;
    
    protected $fillable = ['name', 'slug', 'tagline', 'image', 'status'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public static function laratablesStatus($brand)
    {
        if ($brand->status) {
            return '<span class="badge badge-soft-info">Active</span>';
        }else{
            return '<span class="badge badge-soft-warning">Inactive</span>';
        }
    }

    public static function laratablesImage($brand)
    {
        if ($brand->image) {
            return '<img src="'. asset($brand->image) .'" class="mr-2" alt="" height="52">';
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
