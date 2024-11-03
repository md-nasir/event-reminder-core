@extends('admin.layouts.base')
@section('page_css')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap-datepicker.standalone.min.css') }}">
@endsection

@section('page-heading')
    Send Bulk Reminder
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
                    Example CSV
                    <Pre>
  "Title","Content","Email"
  "Weekly Reminder","A wonderful event coming.","mrx@domain.com"
</Pre>
                    <form class="forms-sample" method="POST" action="{{ route('events.reminder.bulk-send') }}"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="reminder_file" class="required-badge">>Choose CSV File<span>*</span></label>
                            <input type="file" name="reminder_file" id="reminder_file" class="form-control" required>
                            @error('reminder_file')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
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
    <script src="{{ asset('assets/admin/js/bootstrap-datepicker.js') }}"></script

@endsection
