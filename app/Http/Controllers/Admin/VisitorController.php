<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Visitor;
use Freshbitsweb\Laratables\Laratables;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
	public function visitors()
	{
		return Laratables::recordsOf(Visitor::class, function($query)
        {
            return $query->latest('id');
        });
	}
    public function index()
    {
    	return view('admin.visitor.index');
    }

    public function destroy(Request $request)
    {
    	$delete = Visitor::destroy($request->id);

        if($delete){
            return response()->json(['success' => 'Visitor successfully deleted!']);
        }else{
            return response()->json(['error' => 'Deleting failed! Please try again!']);
        }
    }
}
