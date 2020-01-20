<?php

use Carbon\Carbon;

if (! function_exists('date_formate')) {
    
    function date_formate($date, $formate = null)
    {
        if ($formate) {
            return Carbon::parse($date)->format($format);
        }

        return Carbon::parse($date)->format('d M Y');
    }

}
