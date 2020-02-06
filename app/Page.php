<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
	protected $fillable = ['name', 'slug', 'body', 'template', 'is_active'];

	public function metadata()
    {
        return $this->morphOne(MetaData::class, 'metaable');
    }

    public function saveMetaData($request)
    {
        if($this->metadata){
            $this->metadata()->update([
                'meta_title' => $request->meta_title,
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description,
            ]);
        }else{
            if($request->meta_title){
                $this->metadata()->create([
                    'meta_title' => $request->meta_title,
                    'meta_keywords' => $request->meta_keywords,
                    'meta_description' => $request->meta_description,
                ]);
            }
        }
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
