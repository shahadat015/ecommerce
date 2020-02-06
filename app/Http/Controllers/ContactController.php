<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('website.contact');
    }

    public function store(Request $request)
    {
    	$request->validate([
    		'name' => 'required|string|max:60',
    		'email' => 'required|email|max:60',
    		'subject' => 'required|string|max:255',
    		'message' => 'required|string',
    	]);

        $create = Contact::create($request->all());

        if($create){
        	return response()->json(['success' => 'Message successfully sent!']);
        }else{
        	return response()->json(['success' => 'Message sending failed!']);
        }
    }
}
