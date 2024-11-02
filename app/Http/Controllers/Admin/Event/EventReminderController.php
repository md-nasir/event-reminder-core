<?php

namespace App\Http\Controllers\Admin\Event;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Repositories\Contracts\Admin\EventRepositoryInterface;
use App\Traits\LogSupport;
use App\Traits\Template;
use App\Http\Requests\Event\EventRequest;
use Exception;
use Illuminate\Support\Facades\Log;

/**
 * Class EventReminderController
 * @package App\Http\Controllers\Admin\Event
 */
class EventReminderController extends Controller
{
    use Template, LogSupport;

    /**
     * @var string
     */
    protected $templateDir = 'admin.events.reminder';

    /**
     * @var EventRepositoryInterface
     */
    protected $eventRepository;

    public function __construct(EventRepositoryInterface $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    public function create()
    {
        return view($this->template('create'));
    }

    public function send(EventRequest $request)
    {
        try {
            $this->eventRepository->create($request->all());
            return redirect()->back()->with('success', 'Event created successfully.');
        } catch (Exception $e) {
            Log::error($this->logPrefix() . $e->getMessage());
            return redirect()->back()->with('error', 'Event creation was not successful.');
        }
    }

    public function bulkCreate()
    {
        return view($this->template('create'));
    }

    public function bulkSend(EventRequest $request)
    {
        try {
            $this->eventRepository->create($request->all());
            return redirect()->back()->with('success', 'Event created successfully.');
        } catch (Exception $e) {
            Log::error($this->logPrefix() . $e->getMessage());
            return redirect()->back()->with('error', 'Event creation was not successful.');
        }
    }
}
