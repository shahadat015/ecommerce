<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TypiCMS\NestableTrait;

class MenuItem extends Model
{
    use NestableTrait;
    
    protected $fillable = [
        'menu_id', 'category_id', 'page_id', 'parent_id', 'name', 'type', 'url', 'target', 'position', 'is_root', 'is_fluid', 'is_active',
    ];

    public function items()
    {
        return $this->hasMany(MenuItem::class, 'parent_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    public function isCategoryType()
    {
        return $this->type === 'category';
    }

    public function isPageType()
    {
        return $this->type === 'page';
    }

    public function isUrlType()
    {
        return $this->type === 'url';
    }

}
