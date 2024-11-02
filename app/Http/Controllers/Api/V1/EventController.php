<?php

namespace EventReminder\Http\Controllers\Api\V1;

use EventReminder\Http\Controllers\Api\BaseController;
use EventReminder\Services\Contracts\EventServiceInterface;
use EventReminder\Http\Resources\Event\EventCollection;
use EventReminder\Http\Requests\EventRequest;
use Illuminate\Support\Facades\Log;

/**
 * Class EventController
 * @package EventReminder\Http\Controllers\Api\V1
 */
class EventController extends BaseController
{
    /**
     * @var EventServiceInterface
     */
    protected $eventService;

    /**
     * EventController constructor.
     * @param EventServiceInterface $eventService
     */
    public function __construct(EventServiceInterface $eventService)
    {
        $this->eventService = $eventService;
    }

    public function index()
    {
        try {
            $events = $this->eventService->getAllEvents();
            $message = $events->isEmpty() ? 'List is empty' : 'Data fetched successfully';
            return $this->successResponse(new EventCollection($events), $message);
        } catch (\Exception $e) {
            Log::error($this->logPrefix() . ' - ' . $e->getMessage(), ['exception' => $e]);
            return $this->errorResponse();
        }

    }

    public
    function upcoming()
    {
        return response()->json($this->eventService->getUpcomingEvents());
    }

    public
    function completed()
    {
        return response()->json($this->eventService->getCompletedEvents());
    }

    public
    function store(EventRequest $request)
    {
        try {
            $events = $this->eventService->getAllEvents();
            $message = $events->isEmpty() ? 'List is empty' : 'Data fetched successfully';
            return $this->successResponse(new EventCollection($events), $message);
        } catch (\Exception $e) {
            Log::error($this->logPrefix() . ' - ' . $e->getMessage(), ['exception' => $e]);
            return $this->errorResponse();
        }
    }
}
