<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\Invoice;
use App\Order;
use Freshbitsweb\Laratables\Laratables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
	public function orders()
	{
		return Laratables::recordsOf(Order::class, function($query)
        {
            return $query->latest('id');
        });
	}
    public function index()
    {
    	return view('admin.order.index');
    }

    public function show(Order $order)
    {
    	$order->load('products', 'transaction');
    	return view('admin.order.show', compact('order'));
    }

    public function destroy(Request $request)
    {
    	$delete = Order::destroy($request->id);

        if($delete){
            return response()->json(['success' => 'Order successfully deleted!']);
        }else{
            return response()->json(['error' => 'Deleting failed! Please try again!']);
        }
    }

    public function updateStatus(Order $order, Request $request)
    {
    	$order->status = $request->status;
    	$update = $order->save();

    	if($update){
            return response()->json(['success' => 'Order status successfully updated!']);
        }else{
            return response()->json(['error' => 'Updating failed! Please try again!']);
        }

    }

    public function sendInvoice(Order $order)
    {
    	Mail::to($order->customer_email)->send(new Invoice($order));
        return response()->json(['success' => 'Invoice successfully sent!']);
    }
}
