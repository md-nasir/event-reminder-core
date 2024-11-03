@extends('admin.layouts.base')

@section('page_css')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap-datepicker.standalone.min.css') }}">
@endsection

@section('page-heading')
    Edit Event
@endsection

@section('actions')
    <a href="{{ route('events.index') }}" class="btn btn-primary mt-2 mr-3 mt-xl-0">
        <i class="mdi mdi-arrow-left "></i>
        Back
    </a>
@endsection

@section('sections')

    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">

                    <form class="forms-sample" method="POST" action="{{ route('events.update', $event->id) }}">
                        @method('PUT')
                        @csrf
                        <div class="form-group row">
                            <label for="title" class="col-sm-3 col-form-label">Event title<span
                                    class="required-badge">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" id="title" name="title"
                                       class="form-control @error('title') is-invalid @enderror"
                                       placeholder="Enter the event name" value="{{ $event->title }}"
                                       autocomplete="title" autofocus>
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="time_zone" class="col-sm-3 col-form-label">Event TimeZone<span
                                    class="required-badge">*</span></label>
                            <div class="col-sm-8">
                                <select name="time_zone" class="form-control" id="time_zone">
                                    <option>Asia/Dhaka</option>
                                </select>
                                @error('time_zone')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="start_date" class="col-sm-3 col-form-label">Event start date<span
                                    class="required-badge">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" id="start_date" name="start_date"
                                       class="date form-control @error('start_date') is-invalid @enderror"
                                       placeholder="Enter the event start date" value="{{ $event->start_date }}"
                                       autocomplete="start_date" autofocus>

                                @error('start_date')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="start_time" class="col-sm-3 col-form-label">Event start time<span
                                    class="required-badge">*</span></label>
                            <div class="col-sm-8">
                                <input type="time" id="start_time" name="start_time"
                                       class="form-control @error('start_time') is-invalid @enderror"
                                       placeholder="Enter the event start date" value="{{ $event->start_time }}"
                                       autocomplete="start_time" autofocus>

                                @error('start_time')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="end_date" class="col-sm-3 col-form-label">Event end date<span
                                    class="required-badge">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" id="end_date" name="end_date"
                                       class="date form-control @error('end_date') is-invalid @enderror"
                                       placeholder="Enter the event end date" value="{{ $event->end_date }}"
                                       autocomplete="end_date" autofocus>

                                @error('end_date')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="end_time" class="col-sm-3 col-form-label">Event end time<span
                                    class="required-badge">*</span></label>
                            <div class="col-sm-8">
                                <input type="time" id="end_time" name="end_time"
                                       class="form-control @error('end_time') is-invalid @enderror"
                                       placeholder="Enter the event end date" value="{{ $event->end_time }}"
                                       autocomplete="end_time" autofocus>

                                @error('end_time')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">Event Description<span
                                    class="required-badge">*</span></label>
                            <div class="col-sm-8">
                                <textarea name="description" id="description" cols="20" rows="10"
                                          class="ckeditor form-control @error('description') is-invalid @enderror"
                                          placeholder="Enter the description" autocomplete="description"
                                          autofocus>{{ $event->description }}</textarea>

                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="location" class="col-sm-3 col-form-label">Event Location/Address</label>
                            <div class="col-sm-8">
                                <textarea name="location" id="location" cols="20" rows="5"
                                          class="ckeditor form-control @error('location') is-invalid @enderror"
                                          placeholder="Enter the description" autocomplete="location"
                                          autofocus>{{ $event->location }}</textarea>

                                @error('location')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status" class="col-sm-3 col-form-label">Event TimeZone<span
                                    class="required-badge">*</span></label>
                            <div class="col-sm-8">
                                <select name="status" class="form-control" id="status">
                                    <option value="active">Active</option>
                                </select>
                                @error('status')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">
                            Update
                        </button>

                        <a href="{{ route('events.index') }}" class="btn btn-light">
                            Cancel
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page_scripts')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="{{ asset('assets/admin/js/bootstrap-datepicker.js') }}"></script>
    <script type="text/javascript">
        $('.date').datepicker({
            format: 'dd/mm/yyyy',
            orientation: "bottom left",
            todayHighlight: true
        });
    </script>

@endsection
