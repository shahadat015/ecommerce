<?php

namespace App;

use App\Http\Traits\ActivityLog;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use ActivityLog;

    protected static $recordEvents = [ 'updated', 'deleted'];

    protected $fillable = ['customer_id', 'product_id', 'rating', 'reviewer_name', 'comment', 'is_approved'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public static function laratablesStatus($review)
    {
        if ($review->status) {
            return '<span class="badge badge-soft-info">Active</span>';
        }else{
            return '<span class="badge badge-soft-warning">Inactive</span>';
        }
    }

    public static function laratablesCustomAction($action)
    {
        return view('layouts.partials.actions')->with(['view' => false, 'switch' => true, 'action' => $action, 'route' => $action->getTable()])->render();
    }
}
