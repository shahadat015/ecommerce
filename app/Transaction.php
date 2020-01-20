<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
	protected $fillable = [
    	'order_id', 'transaction_id', 'payment_method'
	];

	public static function laratablesCreatedAt($transaction)
    {
        return $transaction->created_at->diffForHumans();
    }

    public static function laratablesCustomAction($action)
    {
        return view('layouts.partials.actions')->with(['view' => false, 'edit' => false, 'action' => $action, 'route' => $action->getTable()])->render();
    }
}
