<?php

namespace App\Http\Controllers\Admin\Event;

use App\Exceptions\Services\EventReminderServiceException;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\Admin\EventRepositoryInterface;
use App\Services\Contracts\Admin\EventReminderServiceInterface;
use App\Traits\LogSupport;
use App\Traits\Template;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Http\Requests\Event\BulkReminderRequest;
use App\Http\Requests\Event\ReminderRequest;

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
    protected $templateDir = 'admin.events.reminders';

    /**
     * @var EventRepositoryInterface
     */
    protected $eventRepository;

    /**
     * @var EventReminderServiceInterface
     */
    protected $eventReminderService;

    public function __construct(
        EventRepositoryInterface $eventRepository,
        EventReminderServiceInterface $eventReminderService
    )
    {
        $this->eventRepository = $eventRepository;
        $this->eventReminderService = $eventReminderService;
    }

    public
    function create(int $eventId)
    {
        $event = $this->eventRepository->findById($eventId);
        return view($this->template('create'), compact('event'));
    }

    public
    function send(ReminderRequest $request, $eventId)
    {
        try {
            $this->eventReminderService->send($request->all());
            return redirect()->back()->with('success', 'Event reminder sent successfully.');
        } catch (Exception $e) {
            Log::error($this->logPrefix() . $e->getMessage());
            return redirect()->back()->with('error', 'Reminder sending failed!');
        }
    }

    public
    function bulkCreate()
    {
        return view($this->template('bulk-create'));
    }

    public
    function bulkSend(BulkReminderRequest $request)
    {
        try {
            $path = $request->file('reminder_file')->getRealPath();
            $this->eventReminderService->bulkSendFromCsv($path);
            return redirect()->back()->with('success', 'Event reminder sent successfully.');
        } catch (EventReminderServiceException $e) {
            Log::error($this->logPrefix() . $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        } catch (Exception $e) {
            Log::error($this->logPrefix() . $e->getMessage());
            return redirect()->back()->with('error', 'Reminder sending failed!');
        }
    }
}
