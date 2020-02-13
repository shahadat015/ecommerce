<?php

namespace App;

use App\Http\Traits\ActivityLog;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles, ActivityLog;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'address', 'password', 'image'
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

    public static function laratablesImage($user)
    {
        if ($user->image) {
            return '<img src="'. asset($user->image) .'" class="mr-2" alt="" height="52">';
        }else{
            return '<img src="'. asset('contents/admin/images/placeholder.png') .'" class="mr-2" alt="" height="52" width="80">';
        }
    }

    public static function laratablesName($user)
    {
        return '<p class="d-inline-block align-middle mb-0">
                    <a href="#" class="d-inline-block align-middle mb-0 product-name">' . $user->name .'</a>
                    <br><span class="text-muted font-13"> '. $user->role($user) .' </span>
                </p>';
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
