<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use Notifiable;

   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'address', 'password', 'image_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function image()
    {
        return $this->belongsTo(Image::class);
    }

    public static function laratablesImagepath($user)
    {
        if ($user->image) {
            return '<img src="'. asset($user->image->path()) .'" class="mr-2" alt="" height="52">';
        }else{
            return '<img src="'. asset('contents/admin/images/placeholder.png') .'" class="mr-2" alt="" height="52" width="80">';
        }
    }

    public static function laratablesCustomAction($action)
    {
        $route  = $action->getTable();
        return view('layouts.partials.actions', compact('action', 'route'))->render();
    }

}
