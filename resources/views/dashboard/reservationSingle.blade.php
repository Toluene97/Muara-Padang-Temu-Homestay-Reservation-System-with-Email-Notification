@extends('index')
@section('title', 'Edit Reservation')
@section('content')
<div class="container">
    <div class="card my-5">
        <div class="card-header">
            <h2>You're booked for the {{ $houseInfo->name }} in {{ $houseInfo->detail }}!</h2>
        </div>
        <div class="card-body">
            <div class="card-body">
                <div class="row">
                    {{-- <div class="col-sm-6">
                        <img src="{{ $houseInfo->image }}" class="img-fluid" alt="Front of hotel">
                    </div> --}}
                    <div class="col-sm-6">
                        <h3 class="card-title">
                            {{ $houseInfo->name }} - <small>{{ $houseInfo->detail }}</small>
                        </h3>
                        <p class="card-text">{{ $houseInfo->detail }}</p>
                        <p class="card-text"><strong>House: </strong>{{ $reservation->house['name'] }}</p>
                        <p class="card-text"><strong>Check In: </strong>{{ $reservation->check_in }}</p>
                        {{-- <p class="card-text"><strong>Room: </strong>{{ $reservation->room['type'] }}</p> --}}
                        <p class="card-text"><strong>Check Out: </strong>{{ $reservation->check_out }}</p>
                        <p class="card-text"><strong>Number of Guest: </strong>{{ $reservation->num_of_guests }}</p>
                        <p class="card-text"><strong>Price: </strong>${{ $reservation->final_price }}</p>
                    </div>                  
                </div>
                <div class="text-center mt-3">
                    <a href="/dashboard/reservations/{{ $reservation->id }}/edit" class="btn btn-lg btn-success">Edit this reservation</a>
                    <a href="/dashboard/reservations/{{ $reservation->id }}/delete" class="btn btn-lg btn-danger">Delete</a>
                </div>
            </div>          
        </div>
    </div>
</div>
@endsection