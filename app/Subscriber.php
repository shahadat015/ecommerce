<?php

namespace App;

use App\Http\Traits\ActivityLog;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use ActivityLog;
    
    protected static $recordEvents = [ 'updated', 'deleted'];
    
    protected $fillable = [ 'email' ];

    public static function laratablesCreatedAt($message)
    {
        return $message->created_at->diffForHumans();
    }

    public static function laratablesStatus($message)
    {
        if ($message->status) {
            return '<span class="badge badge-soft-primary">Active</span>';
        }else{
            return '<span class="badge badge-soft-warning">Inactive</span>';
        }
    }

    public static function laratablesCustomAction($action)
    {
        return view('layouts.partials.actions')->with(['switch' => true, 'edit' => false, 'view' => false, 'action' => $action, 'route' => $action->getTable()])->render();
    }
}
