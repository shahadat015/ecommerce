<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Subscriber;
use Freshbitsweb\Laratables\Laratables;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
	public function subscribers()
    {
    	return Laratables::recordsOf(Subscriber::class, function($query)
        {
            return $query->latest('id');
        });
    }

    public function index()
    {
    	return view('admin.subscriber.index');
    }

    public function update(Subscriber $subscriber)
    {
        if($subscriber->status){
            $subscriber->status = false;
            $subscriber->save();
            return response()->json(['success' => 'Subscriber successfullly disabled!']);
        }
        
        $subscriber->status = true;
        $subscriber->save();
        return response()->json(['success' => 'Subscriber successfullly enabled!']);
    }

    public function destroy(Request $request)
    {
    	$delete = Subscriber::destroy($request->id);

    	if($delete){
    		return response()->json(['success' => 'Subscriber successfully deleted!']);
    	}else{
    		return response()->json(['error' => 'Ops! Please try again']);
    	}
    }
}
