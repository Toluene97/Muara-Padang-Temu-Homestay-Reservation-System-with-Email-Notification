@extends('index')
@section('title', 'Reservations')
@section('content')
<div class="container mt-5">
    <h2>Your Reservations</h2>
    <table class="table mt-3">
        <thead>
            <tr>
            <th scope="col">House</th>
            <th scope="col">Check In</th>
            <th scope="col">Check out</th>  
            <th scope="col">Guests</th>
            <th scope="col">Price</th>
            <th scope="col">Manage</th>
            <th scope="col">User Receipt</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservations as $reservation)
            {{-- {{$reservation->houses->name}} --}}
            <tr>
                    {{-- @foreach ($houses as $house) --}}
                    {{-- <td>{{ $house->name }}</td> --}}
                    
                {{-- <td>{{ $reservation->HouseId }}</td> --}}
                <td>{{$reservation->houses->name}}</td>
                <td>{{ $reservation->check_in }}</td>
                <td>{{ $reservation->check_out }}</td>
                <td>{{ $reservation->num_of_guests }}</td>
                <td>{{ $reservation->final_price }}</td>
                {{-- <td><a href="/dashboard/reservations/{{ $reservation->ReservationId }}/edit" class="btn btn-sm btn-success">Edit</a></td> --}}
                <td><a href="/dashboard/reservations/{{ $reservation->ReservationId }}/status" class="btn btn-sm btn-success">Confirm Reservation</a></td>
                <td><div class="zoom">
                    <img style="width:25%" src="/storage/recipt_image/{{$reservation->recipt_image}}">
                </div></td>
                
            </tr>
            @endforeach          
        </tbody>
        </table>
    {{-- @foreach ($houses as $house)
        {{$houses->name}}
    @endforeach --}}

    <h3>deposit approve pending</h3>

    @if(!empty(Session::get('success')))
        <div class="alert alert-success"> {{ Session::get('success') }}</div>
    @endif
    @if(!empty(Session::get('error')))
        <div class="alert alert-danger"> {{ Session::get('error') }}</div>
    @endif
</div>
@endsection