@extends('admin.layouts.base')
@section('page_css')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap-datepicker.standalone.min.css') }}">
@endsection

@section('page-heading')
    Send Email Reminder
@endsection

@section('actions')
    <a href="{{ route('events.index') }}" class="btn btn-primary mt-2 mr-3 mt-xl-0">
        <i class="mdi mdi-arrow-left "></i>
        Event List
    </a>
@endsection

@section('sections')

    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">

                    <form class="forms-sample" method="POST" action="{{ route('events.reminder.send', $event->id) }}">
                        @csrf
                        <div class="form-group row">
                            <label for="title" class="col-sm-3 col-form-label">Reminder title<span
                                    class="required-badge">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" id="title" name="title"
                                       class="form-control @error('title') is-invalid @enderror"
                                       placeholder="Enter the event name"
                                       value="{{ "Are you read for {$event->title}?" }}"
                                       autocomplete="title" autofocus>
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">Reminder body<span
                                    class="required-badge">*</span></label>
                            <div class="col-sm-8">
                                <textarea name="content" id="content" cols="20" rows="10"
                                          class="ckeditor form-control @error('content') is-invalid @enderror"
                                          autocomplete="content"
                                          autofocus>
                                    Event: {{ $event->title }}

                                    Start Date: {{ $event->start_date }} Time: {{ $event->start_time }}

                                    Location: {{ $event->location }}
                                </textarea>

                                @error('content')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="recipients" class="col-sm-3 col-form-label">Recipients Emails (Comma
                                Separated)</label>
                            <div class="col-sm-8">
                                <textarea name="recipients" id="recipients" cols="20" rows="5"
                                          class="ckeditor form-control @error('recipients') is-invalid @enderror"
                                          placeholder="x@gmail.com,y@gmail.com" autocomplete="recipients"
                                          autofocus>{{ $event->recipaintes }}</textarea>

                                @error('recipaintes')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">
                            Send
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

@endsection
