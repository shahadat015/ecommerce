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
        'name', 'email', 'password',
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

    public static function laratablesOrderName()
    {
        return 'id';
    }

    public static function laratablesCustomAction($action)
    {
        
        $show = 'admin.users.show';       
        $edit = 'admin.users.edit';
        $delte = 'admin.users.destroy';
        return view('admin.partials.action', compact('action', 'show', 'edit', 'delte'))->render();
    }

    public static function laratablesRoleRelationQuery()
    {
        return function ($query) {
            $query->with('roles');
        };
    }
}
