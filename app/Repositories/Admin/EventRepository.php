<?php

namespace App\Repositories\Admin;

use App\Filters\Admin\EventsFilter;
use App\Repositories\Contracts\Admin\EventRepositoryInterface;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

/**
 * Class EventRepository
 * @package App\Repositories\Admin
 */
class EventRepository extends EventsFilter implements EventRepositoryInterface
{

    public function getAll()
    {
        $events = $this->filter(Event::latest());
        return $events->paginate(request()->per_page ?: 10);
    }

    public function findById(int $id)
    {
        return Event::findOrFail($id);
    }

    public function create(array $data)
    {
        $data['code'] = getEventUniqId();
        $data['created_by_id'] = Auth::id();
        $data['updated_by_id'] = Auth::id();
        return Event::create($data);
    }

    public function update(int $id, array $data)
    {
        $data['updated_by_id'] = Auth::id();
        return Event::where('id', $id)->update($data);
    }

    public function delete(int $id)
    {
        return Event::destroy($id);
    }

}
