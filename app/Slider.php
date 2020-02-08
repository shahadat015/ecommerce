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

    public static function laratablesAutoplay($slider)
    {
        if ($slider->autoplay) {
            return '<span class="badge badge-soft-primary">True</span>';
        }else{
            return '<span class="badge badge-soft-warning">False</span>';
        }
    }

    public static function laratablesAutoplaySpeed($slider)
    {
       return $slider->autoplay_speed / 1000 . 's';
    }

    public static function laratablesCustomAction($action)
    {
       return view('layouts.partials.actions')->with(['view' => false, 'action' => $action, 'route' => $action->getTable()])->render();
    }
}
