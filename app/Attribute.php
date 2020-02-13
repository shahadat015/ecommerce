<?php

namespace App;

use App\Http\Traits\ActivityLog;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use ActivityLog;
    
    protected $fillable = ['attribute_set_id', 'name', 'slug', 'status'];
    
    public function values() {
    	return $this->hasMany(AttributeValue::class);
    }

    public static function laratablesStatus($attribute)
    {
        if ($attribute->status) {
            return '<span class="badge badge-soft-info">Active</span>';
        }else{
            return '<span class="badge badge-soft-warning">Inactive</span>';
        }
    }

    public static function laratablesCustomAction($action)
    {
        return view('layouts.partials.actions')->with(['view' => false, 'action' => $action, 'route' => $action->getTable()])->render();
    }

}
