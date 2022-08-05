<?php

use Carbon\Carbon;

if (!function_exists('formatDateAndTime')) {
    function formatDateAndTime($value, $format = 'd/m/Y')
    {
        return Carbon::parse($value)->setTimezone('America/Sao_Paulo')->format($format);
    }
}
