<?php

namespace App\Filters\Admin;

use Illuminate\Http\Request;
use App\Filters\Contracts\FilterInterface;

/**
 * Class EventsFilter
 * @package App\Filters\Admin
 */
class EventsFilter implements FilterInterface
{

    /**
     * @param Request $request
     * @param $modelObject
     * @return mixed
     */
    public function filter(Request $request, $modelObject)
    {

        return $modelObject;
    }
}
