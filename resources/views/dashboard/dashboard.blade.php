@extends('index')
@section('title', 'Dashboard')
@section('content')
<div class="container text-center my-5">
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
            <div class="card-body">
                <h4 class="card-title">Manage your Reservations</h4>
                <p class="card-text">Modify your current reservations.</p>
                <a href="/dashboard/reservations" class="btn btn-primary">My Reservations</a>
            </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
            <div class="card-body">
                <h4 class="card-title">Find a House</h4>
                <p class="card-text">Browse our catalog of top-rated houses.</p>
                <a href="/houses" class="btn btn-primary">Our House</a>
            </div>
            </div>
        </div>

        <style>
                .container.calendar {
                  position: relative;
                  width: 50%;
                  max-width: 100px;
                }
        </style>

        <div class="panel panel-primary">
            <div class="panel panel-heading"><h2>MY Reservation Details</h2></div>
            <div class="c-modal jsModalContainer">
            <div class="panel-body">
                {!! $calendar_details->calendar() !!}
                {!! $calendar_details->script() !!}
            </div>
            </div>
        </div>
    </div>
</div>
@endsection