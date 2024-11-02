@extends('admin.layouts.base')

@section('page-heading')
View Event
@endsection

@section('actions')
<a href="javascript:history.back()" class="btn btn-primary mt-2 mr-3 mt-xl-0">
    <i class="mdi mdi-arrow-left "></i>
    Back
</a>
@endsection

@section('sections')

<div class="row">
    <div class="col-md-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <h1>{{ $event->name }}</h1>
                <p><b> Start Date : </b>{{ addDateFormate($event->start_date) }}</p>
                <p><b> End Date: </b>{{ addDateFormate($event->end_date) }}</p>
                <p><b> Description: </b><br /> {!! $event->description !!}</p>
            </div>
        </div>
    </div>
</div>

@endsection