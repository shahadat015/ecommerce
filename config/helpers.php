<?php

use Carbon\Carbon;

if (! function_exists('date_formate')) {
    
    function date_formate($date, $format = null)
    {
    	if($format){
    		return Carbon::parse($date)->format($format);
    	}

    	return Carbon::parse($date)->format('d M Y');
        
    }
}