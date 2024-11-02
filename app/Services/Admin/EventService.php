<?php

namespace App\Services\Admin;

use App\Repositories\Contracts\Admin\EventRepositoryInterface;
use App\Services\Contracts\Admin\EventServiceInterface;

/**
 * Class EventService
 * @package App\Services\Admin
 */
class EventService implements EventServiceInterface
{
    protected $eventRepository;

    public function __construct(EventRepositoryInterface $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    public function getAllEvents()
    {
        return $this->eventRepository->getAll();
    }

    public function createEvent(array $data)
    {
        return $this->eventRepository->create($data);
    }

}
