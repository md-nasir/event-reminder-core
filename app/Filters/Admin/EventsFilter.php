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
     * @param Request $modelObject
     * @return Request|mixed
     */
    public function filter($modelObject)
    {
        if (!empty(request()->name)) {
            $modelObject = $modelObject->where('title', 'like', '%' . request()->name . '%');
        }
        return $modelObject;
    }
}
