<?php

namespace App\Http\Controllers;

use App\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function store(Request $request)
    {
    	$request->validate([
    		'email_address' => 'required|email|max:60|unique:subscribers,email'
    	]);

        $create = Subscriber::create([ 'email' => $request->email_address ]);

        if($create){
        	return response()->json(['success' => 'Subscription successfully added!']);
        }else{
        	return response()->json(['success' => 'Subscribing failed!']);
        }
    }
}
