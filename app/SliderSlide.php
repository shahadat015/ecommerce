<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SliderSlide extends Model
{
    protected $fillable = [
        'slider_id', 'image_id', 'title', 'subtitle', 'call_to_action_text', 'call_to_action_url', 'open_in_new_window'
    ];

    public function image()
    {
        return $this->belongsTo(Image::class);
    }
}
