<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['name', 'path', 'size', 'mime', 'extension'];

    public function path()
    {
    	return 'storage/' . $this->path;
    }

    public static function laratablesPath($image)
    {
        return '<img height="50" src=" ' . asset($image->path()) .'" alt="{{ $image->name }}">';
    }

    public static function laratablesCustomAction($action)
    {
        return view('layouts.partials.actions')->with(['action' => $action, 'route' => $action->getTable(), 'view' => false, 'edit' => false, 'image' => true])->render();
    }
}
