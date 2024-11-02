<?php

use Illuminate\Support\Str;

if (!function_exists('getEventUniqId')) {
    function getEventUniqId(): string
    {
        $prefix = config('eventreminder.event_prefix');
        return $prefix . '_' . Str::uuid()->toString();
    }
}
