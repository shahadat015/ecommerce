<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Freshbitsweb\Laratables\Laratables;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class ActivityLogController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:View Activity Log')->only(['index']);
        $this->middleware('permission:Delete Activityl Log')->only(['destroy']);
    }

	public function activitylogs()
	{
		return Laratables::recordsOf(Activity::class, function($query)
        {
            return $query->latest('id');
        });
	}

    public function index()
    {
    	return view('admin.activitylog.index');
    }

    public function show(Activity $activitylog)
    {
        $activitylog->load('causer');
        return view('admin.activitylog.show', compact('activitylog'));
    }

    public function destroy(Request $request)
    {
    	$delete = Activity::destroy($request->id);

        if($delete){
            return response()->json(['success' => 'Activity Log successfully deleted!']);
        }else{
            return response()->json(['error' => 'Deleting failed! Please try again!']);
        }
    }
}
