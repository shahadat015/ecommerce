<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Transaction;
use Freshbitsweb\Laratables\Laratables;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:View Transaction')->only(['index']);
        $this->middleware('permission:Delete Transaction')->only(['destroy']);
    }

	public function transactions()
	{
		return Laratables::recordsOf(Transaction::class, function($query)
        {
            return $query->latest('id');
        });
	}
    public function index()
    {
    	return view('admin.transaction.index');
    }

    public function destroy(Request $request)
    {
    	$delete = Transaction::destroy($request->id);

        if($delete){
            return response()->json(['success' => 'Transaction successfully deleted!']);
        }else{
            return response()->json(['error' => 'Deleting failed! Please try again!']);
        }
    }
}
