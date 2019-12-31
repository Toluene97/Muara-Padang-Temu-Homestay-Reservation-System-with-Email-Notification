@extends('layouts.app') 

@section('title', 'Reservations')
@section('content')
<div class="container mt-5">
    <h2>Homestay Reservations</h2>
    <table class="table mt-3">
        <thead>
            <tr>
            <th scope="col">House</th>
            <th scope="col">Check In</th>
            <th scope="col">Check out</th>
            <th scope="col">Guests</th>
            <th scope="col">Price</th>
            <th scope="col">status</th>
            <th scope="col">Manage</th>
            <th scope="col">View Invoice</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservations as $reservationKey => $reservation)
            <tr>
                <td>{{$reservation->houses->name}}</td>
                {{-- <td>{{$house->name}}</td> --}}
                <td>{{ $reservation->check_in }}</td>
                <td>{{ $reservation->check_out }}</td>
                <td>{{ $reservation->num_of_guests }}</td>
                <td>${{ $reservation->final_price }}</td>
                {{-- <td>{{ $reservations->status }}</td> --}}
                <td><a href="/dashboard/reservations/{{ $reservation->id }}/edit" class="btn btn-sm btn-success">Edit</a></td>
                <td><a href="files"></a></td>
            </tr>
            @endforeach          
        </tbody>
    </table>
    @if(!empty(Session::get('success')))
        <div class="alert alert-success"> {{ Session::get('success') }}</div>
    @endif
    @if(!empty(Session::get('error')))
        <div class="alert alert-danger"> {{ Session::get('error') }}</div>
    @endif
</div>
@endsection

