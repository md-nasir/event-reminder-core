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
 * Class EventController
 * @package App\Http\Controllers\Admin\Event
 */
class EventController extends Controller
{
    use Template, LogSupport;

    /**
     * @var string
     */
    protected $templateDir = 'admin.events';

    /**
     * @var EventRepositoryInterface
     */
    protected $eventRepository;

    public function __construct(EventRepositoryInterface $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(
            $this->template('index'),
            ['events' => $this->eventRepository->getAll()]
        );
    }

    public function create()
    {
        return view($this->template('create'));
    }

    public function store(EventRequest $request)
    {
        try {
            $this->eventRepository->create($request->all());
            return redirect()->back()->with('success', 'Event created successfully.');
        } catch (Exception $e) {
            Log::error($this->logPrefix() . $e->getMessage());
            return redirect()->back()->with('error', 'Event creation was not successful.');
        }
    }

    public function show(Event $event)
    {
        return view($this->template('preview'), compact('event'));
    }


    public function edit(Event $event)
    {
        return view($this->template('edit'), compact('event'));
    }

    public function update(EventRequest $request, int $id)
    {
        try {
            $this->eventRepository->update( $id, $request->except('_method','_token'));
            return redirect()->back()->with('success', 'Event updated successfully.');
        } catch (Exception $e) {
            Log::error('EventController@store: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Event update was not successful.');
        }
    }


    public function destroy(int $id)
    {
        try {
            $this->eventRepository->delete($id);
            return redirect()->back()->with('success', 'Event deleted successfully.');
        } catch (Exception $e) {
            Log::error('EventController@destroy: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Event deletion was not successful.');
        }
    }
}
