<?php

namespace App;

use App\Http\Traits\ActivityLog;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use ActivityLog;
    
    protected $fillable = ['name', 'type', 'is_required', 'is_global'];
    
    public function values() {
    	return $this->hasMany(OptionValue::class);
    }

    public static function laratablesType($option)
    {
        return ucwords(str_replace('_', ' ', $option->type));
    }

    public static function laratablesCustomAction($action)
    {
        return view('layouts.partials.actions')->with(['view' => false, 'action' => $action, 'route' => $action->getTable()])->render();
    }
}
