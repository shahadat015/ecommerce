<?php

namespace App\Http\Traits;

use Spatie\Activitylog\Traits\LogsActivity;

trait ActivityLog {
	
	use LogsActivity;

	protected static $logAttributes = ['*'];
    
    protected static $logAttributesToIgnore = [ 'password', 'created_at', 'updated_at', 'menu_id', 'category_id', 'brand_id', 'in_stock', 'slug', 'attribute_set_id', 'is_global', 'is_required', 'is_percent', 'product_id', 'customer_id', 'coupon_id', 'provider_id', 'page_id', 'parent_id', 'is_root', 'is_active', 'status'];
    
    protected static $logOnlyDirty = true;

    protected static $submitEmptyLogs = false;

    public function getDescriptionForEvent(string $eventName): string
    {
        return class_basename(static::class) ." has been {$eventName}";
    }
}