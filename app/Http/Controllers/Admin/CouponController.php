<?php

namespace App\Http\Controllers\Admin;

use App\Coupon;
use App\Http\Controllers\Controller;
use Freshbitsweb\Laratables\Laratables;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function coupons()
    {
    	return Laratables::recordsOf(Coupon::class, function($query)
        {
            return $query->latest('id');
        });
    }
    public function index()
    {
    	return view('admin.coupon.index');
    }
    public function create()
    {
    	return view('admin.coupon.create');
    }
}
