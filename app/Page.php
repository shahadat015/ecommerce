<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
	protected $fillable = ['name', 'slug', 'body', 'is_active'];

	public function metadata()
    {
        return $this->morphOne(MetaData::class, 'metaable');
    }

    public static function laratablesIsActive($page)
    {
        if ($page->is_active) {
            return '<span class="badge badge-soft-info">Active</span>';
        }else{
            return '<span class="badge badge-soft-warning">Inactive</span>';
        }
    }

    public static function laratablesCustomAction($action)
    {
        return view('layouts.partials.actions')->with(['view' => false, 'action' => $action, 'route' => $action->getTable()])->render();
    }
}
