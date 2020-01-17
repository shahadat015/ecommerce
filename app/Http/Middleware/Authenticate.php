<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Request;

class Authenticate extends Middleware
{
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
        	if($request->is('customer', 'customer/*')){
        		return route('customer.login');
        	}else{
        		return route('login');
        	}
        }
    }
}
