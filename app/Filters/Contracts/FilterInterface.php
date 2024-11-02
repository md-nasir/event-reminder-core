<?php

namespace App\Filters\Contracts;

use Illuminate\Http\Request;

/**
 * Interface FilterInterface
 * @package App\Filters
 */
interface FilterInterface
{
    /**
     * @param Request $request
     * @param $modelObject
     * @return mixed
     */
    public function filter(Request $request, $modelObject);
}
