<?php

namespace App\Http\Controllers\Admin;

use App\Category;
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
    	$categories = Category::orderBy('parent_id')->get()->nest()->setIndent('|-- ')->listsFlattened('name');
    	return view('admin.coupon.create', compact('categories'));
    }

    public function store(Request $request)
    {
    	$request->validate([
    		'name' => 'required|string|max:255',
    		'code' => 'required|string|max:255|unique:coupons',
    		'value' => 'required|numeric',
    		'start_date' => 'nullable|date|required_with:end_date',
    		'end_date' => 'nullable|date|required_with:start_date|after:start_date',
    		'minimum_spend' => 'nullable|numeric',
    		'maximum_spend' => 'nullable|numeric',
    		'usage_limit_per_coupon' => 'nullable|numeric',
    		'usage_limit_per_customer' => 'nullable|numeric'
    	]);

    	$request['free_shipping'] = (boolean) $request->free_shipping;
    	$request['is_active'] = (boolean) $request->is_active;
    	$coupon = Coupon::create($request->all());
    	$coupon->categories()->attach($request->categories);
    	$coupon->products()->attach($request->products);

    	if($coupon){
    		return response()->json(['success' => 'Coupon successfully created!']);
    	}else{
    		return response()->json(['error' => 'Ops! Please try again']);
    	}
    }

    public function edit(Coupon $coupon)
    {
    	$categories = Category::orderBy('parent_id')->get()->nest()->setIndent('|-- ')->listsFlattened('name');
    	return view('admin.coupon.edit', compact('categories', 'coupon'));
    }

    public function update(Request $request, Coupon $coupon)
    {
    	$request->validate([
    		'name' => 'required|string|max:255',
    		'code' => 'required|string|max:255|unique:coupons,code,'.$coupon->id,
    		'value' => 'required|numeric',
    		'start_date' => 'nullable|date|required_with:end_date',
    		'end_date' => 'nullable|date|required_with:start_date|after:start_date',
    		'minimum_spend' => 'nullable|numeric',
    		'maximum_spend' => 'nullable|numeric',
    		'usage_limit_per_coupon' => 'nullable|numeric',
    		'usage_limit_per_customer' => 'nullable|numeric'
    	]);

    	$request['free_shipping'] = (boolean) $request->free_shipping;
    	$request['is_active'] = (boolean) $request->is_active;
    	$coupon->update($request->all());
    	$coupon->categories()->sync($request->categories);
    	$coupon->products()->sync($request->products);

    	if($coupon){
    		return response()->json(['success' => 'Coupon successfully updated!']);
    	}else{
    		return response()->json(['error' => 'Ops! Please try again']);
    	}
    }

    public function destroy(Request $request)
    {
    	$delete = Coupon::destroy($request->id);

    	if($delete){
    		return response()->json(['success' => 'Coupon successfully delete!']);
    	}else{
    		return response()->json(['error' => 'Ops! Please try again']);
    	}
    }
}
