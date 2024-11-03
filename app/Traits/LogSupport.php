<?php

namespace App\Traits;

/**
 * Trait LogSupport
 * @package App\Traits
 */
trait LogSupport
{
    /**
     * @return string
     */
    public function logPrefix()
    {
        $trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2);
        $class = $trace[1]['class'] ?? null;
        $method = $trace[1]['function'] ?? null;

        return "{$class}@{$method} : ";
    }

}
