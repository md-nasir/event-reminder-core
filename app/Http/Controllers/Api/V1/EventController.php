<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\BaseController;
use Illuminate\Support\Facades\Log;
use App\Repositories\Contracts\Api\EventRepositoryInterface;
use App\Http\Resources\Event\EventCollection;

/**
 * Class EventController
 * @package EventReminder\Http\Controllers\Api\V1
 */
class EventController extends BaseController
{
    /**
     * @var EventRepositoryInterface
     */
    protected $eventRepository;

    /**
     * EventController constructor.
     * @param EventRepositoryInterface $eventRepository
     */
    public function __construct(EventRepositoryInterface $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    public function upcomingEvents()
    {
        try {
            $events = $this->eventRepository->upcomingEvents();
            return $this->successResponse(new EventCollection($events));
        } catch (\Exception $e) {
            Log::error($this->logPrefix() . ' - ' . $e->getMessage(), ['exception' => $e]);
            return $this->errorResponse();
        }
    }

    public function completedEvents()
    {
        try {
            $events = $this->eventRepository->upcomingEvents();
            return $this->successResponse(new EventCollection($events));
        } catch (\Exception $e) {
            Log::error($this->logPrefix() . ' - ' . $e->getMessage(), ['exception' => $e]);
            return $this->errorResponse();
        }
    }
}
