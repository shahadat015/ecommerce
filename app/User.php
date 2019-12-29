<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, HasRoles;

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

    public static function laratablesName($user)
    {
        if ($user->image) {
            return '<img src="'. asset($user->image->path()) .'" class="mr-2" alt="" height="52">';
        }else{
            return '<img src="'. asset('contents/admin/images/placeholder.png') .'" class="mr-2" alt="" height="52" width="80"> 
                    <p class="d-inline-block align-middle mb-0">
                        <a href="#" class="d-inline-block align-middle mb-0 product-name">' . $user->name .'</a>
                        <br><span class="text-muted font-13"> '. $user->role($user) .' </span>
                    </p>';
        }
    }

    public function role($user)
    {
        foreach($user->roles as $role){  
            return '<span class="text-muted font-13"> '. $role->name .' </span>'; 
        }
    }

    public static function laratablesCustomAction($action)
    {
        $route  = $action->getTable();
        return view('layouts.partials.actions', compact('action', 'route'))->render();
    }


}
