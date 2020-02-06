<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
    	'name', 'email', 'subject', 'message'
    ];

    public static function laratablesStatus($message)
    {
        if ($message->status) {
            return '<span class="badge badge-soft-info">Readed</span>';
        }else{
            return '<span class="badge badge-soft-primary">Unreaded</span>';
        }
    }

    public static function laratablesRowClass($message)
    {
        return $message->status ? '' : 'font-weight-bold';
    }

    public static function laratablesCreatedAt($message)
    {
        return $message->created_at->diffForHumans();
    }

    public static function laratablesCustomAction($action)
    {
        return view('layouts.partials.actions')->with(['edit' => false, 'action' => $action, 'route' => 'messages'])->render();
    }
}
