<?php

namespace App;

use App\Http\Traits\ActivityLog;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use ActivityLog;
    
    protected $fillable = ['name', 'is_active'];

    public function menuItems()
    {
        return $this->hasMany(MenuItem::class);
    }

    public static function laratablesIsActive($menu)
    {
        if ($menu->is_active) {
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
