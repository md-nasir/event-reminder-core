<?php

namespace App\Repositories\Api;

use App\Repositories\Contracts\Api\EventRepositoryInterface;
use App\Models\Event;
use App\Enums\EventStatus;

/**
 * Class EventRepository
 * @package App\Repositories\Admin
 */
class EventRepository implements EventRepositoryInterface
{
    public function upComingEvents()
    {
        return Event::query()
            ->select(['id', 'title', 'start_date', 'start_time', 'location', 'status'])
            ->where('status', EventStatus::Active->value)
            ->orderBy('start_date')
        ->paginate(request('per_page') ?: 10);
    }

    public function completedEvents()
    {
        return Event::query()
            ->select(['id', 'title', 'start_date', 'start_time', 'location', 'status'])
            ->where('status', EventStatus::Completed->value)
            ->orderBy('end_date')
        ->paginate(request('per_page') ?: 10);
    }
}
