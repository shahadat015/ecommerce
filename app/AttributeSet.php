<?php

namespace App;

use App\Http\Traits\ActivityLog;
use Illuminate\Database\Eloquent\Model;

class AttributeSet extends Model
{
    use ActivityLog;
    
    protected $fillable = ['name', 'slug', 'status'];

    public function attributes() {
        return $this->hasMany(Attribute::class);
    }

    public static function laratablesStatus($attributeset)
    {
        if ($attributeset->status) {
            return '<span class="badge badge-soft-info">Active</span>';
        }else{
            return '<span class="badge badge-soft-warning">Inactive</span>';
        }
    }

    public static function laratablesCustomAction($action)
    {
        $route  = str_replace('_', '-', $action->getTable());
        return view('layouts.partials.actions')->with(['view' => false, 'action' => $action, 'route' => $route])->render();
    }

    public function scopeActive($query)
    {
        $query->where('status', 1);
    }
}
