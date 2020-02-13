<?php

namespace App;

use App\Http\Traits\ActivityLog;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use ActivityLog;
    
    protected static $recordEvents = ['deleted'];

	protected $fillable = [
    	'order_id', 'transaction_id', 'payment_method', 'amount'
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
