<?php

namespace App\Enums;

enum EventStatus: string
{
    case Active = 'active';
    case Halted = 'halted';
    case Canceled = 'canceled';
    case Completed = 'completed';


    public static function options()
    {
      return array_map(fn($case) => $case->value, self::cases());
    }
}
