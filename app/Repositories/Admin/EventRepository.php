<?php

namespace App\Repositories\Admin;

use App\Repositories\Contracts\Admin\EventRepositoryInterface;
use App\Models\Event;

/**
 * Class EventRepository
 * @package App\Repositories\Admin
 */
class EventRepository implements EventRepositoryInterface
{

    public function getAll(array $filters = [], int $perPage = 10)
    {
        $events = Event::latest();

        if (!empty($filters['name'])) {
            $events->where('name', 'LIKE', '%' . $filters['name'] . '%');
        }

        return $events->paginate($perPage);
    }

    public function findById(int $id)
    {
        return Event::findOrFail($id);
    }

    public function create(array $data)
    {
        $data['code'] = $this->generateUniqueEventId();
        $data['created_by_id'] = 3;
        $data['updated_by_id'] = 3;
        return Event::create($data);
    }


    public function update(int $id, array $data)
    {
        return Event::where('id', $id)->update($data);
    }

    public function delete(int $id)
    {
        return Event::destroy($id);
    }

    /**
     * Generate a unique event ID.
     *
     * @return string
     */
    protected function generateUniqueEventId(): string
    {
        return 'EVT-' . strtoupper(uniqid());
    }
}
