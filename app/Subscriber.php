<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    protected $fillable = [ 'email' ];

    public static function laratablesCreatedAt($message)
    {
        return $message->created_at->diffForHumans();
    }

    public static function laratablesStatus($message)
    {
        if ($message->status) {
            return '<span class="badge badge-soft-primary">Active</span>';
        }else{
            return '<span class="badge badge-soft-warning">Inactive</span>';
        }
    }

    public static function laratablesCustomAction($action)
    {
        return view('layouts.partials.actions')->with(['switch' => true, 'edit' => false, 'view' => false, 'action' => $action, 'route' => 'messages'])->render();
    }
}
