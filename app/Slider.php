<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'name', 'autoplay', 'autoplay_speed', 'arrows', 'dots', 'status'
    ];

    public function slides()
    {
    	return $this->hasMany(SliderSlide::class);
    }

    public static function laratablesCustomAction($action)
    {
       return view('layouts.partials.actions')->with(['view' => false, 'action' => $action, 'route' => $action->getTable()])->render();
    }
}
