<?php

namespace App\Filters\Contracts;

use Illuminate\Http\Request;

/**
 * Interface FilterInterface
 * @package App\Filters\Contracts
 */
interface FilterInterface
{
    public function filter($modelObject);
}
