@extends('admin.layouts.base')

@section('page-heading')
    Events
@endsection

@section('actions')
{{--    @if (hasPermission('events.create'))--}}
        <a href="{{ route('events.create') }}" class="btn btn-primary mt-2 mr-3 mt-xl-0">
            <i class="mdi mdi-grease-pencil"></i>
            Add New
        </a>
{{--    @endif--}}
@endsection

@section('sections')

    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="card">
                        <div class="card-body">
                            <form action="">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label>Name:</label>
                                        <input type="text" class="form-control" name="name" value="{{ request('name') }}" placeholder="Enter name">
                                    </div>
                                    <div class="col-md-3">
                                        <label>Per Page:</label>
                                        <select class="form-control" name="per_page">
                                            @foreach ($perPageItems as $itemCount)
                                                <option value="{{ $itemCount }}"
                                                    {{ $itemCount == request('per_page') ? 'selected' : '' }}>
                                                    {{ $itemCount }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Apply/Reset</label>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-sm btn-outline-github mr-2">Search</button>
                                            <a href="{{ route('events.index') }}"
                                                class="btn btn-sm btn-outline-google">Reset</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="mt-3 table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">SL#</th>
                                    <th class="min-width-25">Name</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Timezone</th>
                                    <th>Location</th>
                                    <th colspan="2" class="action-min-width">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if ($events->count() > 0)
                                    @foreach ($events as $k => $event)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $event->title }}</td>
                                            <td>{{ $event->start_date }}</td>
                                            <td>{{ $event->start_time }}</td>
                                            <td>{{ $event->time_zone }}</td>
                                            <td>{{ $event->location }}</td>
                                            <td class="action">
                                                <a href="{{ route('events.reminder.create', $event->id) }}"
                                                   class="btn btn-sm btn-warning" title="Sent Reminder">Sent Reminder
                                                </a>
                                            </td>
                                            <td class="action">
{{--                                                @if (hasPermission('events.edit'))--}}
                                                    <a href="{{ route('events.edit', $event->id) }}"
                                                        class="btn btn-sm btn-info" title="Update event">
                                                        <i class="mdi mdi-square-edit-outline"></i>
                                                    </a>
{{--                                                @endif--}}
{{--                                                @if (hasPermission('events.destroy'))--}}
                                                    <form onsubmit="return confirmationDelete()" action="{{ route('events.destroy', $event->id) }}" method="POST"
                                                        class="d-inline-block">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" title="Delete Event"
                                                            class="btn btn-sm btn-danger">
                                                            <i class="mdi mdi-trash-can-outline"></i>
                                                        </button>
                                                    </form>
{{--                                                @endif--}}
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" class="text-center">No events found!</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        <div class="mt-3 d-flex justify-content-end">
                            {!! $events->appends(request()->query())->links() !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
