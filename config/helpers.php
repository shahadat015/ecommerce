<?php

use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;

if (! function_exists('date_formate')) {
    
    function date_formate($date, $format = null)
    {
    	if($format){
    		return Carbon::parse($date)->format($format);
    	}

    	return Carbon::parse($date)->format('d M Y');
        
    }
}

if (! function_exists('rating_star_class')) {
    /**
     * Get class for rating star.
     *
     * @param int|float $rating
     * @param int $forStar
     * @return string
     */
    function rating_star_class($rating, $forStar)
    {
        $class = $rating >= $forStar ? 'fas fa-star' : 'far fa-star fa-xs';

        if (fmod($rating, 1) === 0.0) {
            return $class;
        }

        if (is_float($rating) && ceil($rating) === (float) $forStar) {
            $class = 'fas fa-star-half';
        }

        return $class;
    }
}