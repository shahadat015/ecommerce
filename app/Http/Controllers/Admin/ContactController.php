<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Contact;
use Freshbitsweb\Laratables\Laratables;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:View Message')->only(['index', 'show']);
        $this->middleware('permission:Delete Message')->only(['destroy']);
    }

	public function messages()
    {
    	return Laratables::recordsOf(Contact::class, function($query)
        {
            return $query->latest('id');
        });
    }

    public function index()
    {
    	return view('admin.contact.index');
    }

    public function show(Contact $message)
    {
        $message->status = true;
        $message->save();
        return view('admin.contact.show', compact('message'));
    }

    public function destroy(Request $request)
    {
    	$delete = Contact::destroy($request->id);

    	if($delete){
    		return response()->json(['success' => 'Message successfully deleted!']);
    	}else{
    		return response()->json(['error' => 'Ops! Please try again']);
    	}
    }
}
