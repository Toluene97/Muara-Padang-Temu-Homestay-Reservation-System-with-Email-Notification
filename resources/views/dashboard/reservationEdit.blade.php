@extends('layouts.app')
@section('title', 'Edit Reservation')
@section('content')
<div class="container">
    <div class="card my-5">
        <div class="card-header">
            <h2>{{ $houseInfo->name }} - <small class="text-muted">{{ $houseInfo->detail }}</small></h2>
        </div>
        <div class="card-body">
            <h5 class="card-title"></h5>
            <p class="card-text">Book your stay now at the most magnificent resort in the world!</p>
            {{-- <form action="{{ route('reservations.update', $reservation->ReservationId) }}" method="POST"> --}}
            {{ Form::open(['action'=>['ReservationController@update',$reservation->ReservationId],'method'=>'POST','enctype'=>'multipart/form-data']) }}
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="house">House Type</label>
                            {{-- <select class="form-control" name="HouseId" value="{{ old('HouseId', $reservation->HouseId) }}">

                                @foreach ($houseInfo->houses as $option)
                                    <option value="{{$option->id}}">
                                        {{ $option->type }} - ${{ $option->price }}
                                    </option>
                                @endforeach

                            </select> --}}
                            <input type="text" class="form-control" disabled name="HouseId" value="{{ old('HouseId', $reservation->houses->name) }}" >
                            {{-- <select class="form-control" name="HouseId" value="{{ old('HouseId', $reservation->HouseId) }}">
                                <option value="1">Marriott</option>
                                <option value="2">Sutra</option>
                                <option value="3">Maya</option>
                            </select> --}}
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="guests">Number of guests</label>
                            <input class="form-control" name="num_of_guests" value="{{ old('num_of_guests', $reservation->num_of_guests) }}">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                        <label for="guests">Amount Of Payment</label>
                        <input type="text" class="form-control" disabled name="final_price" value="{{ old('final_price', $reservation->final_price) }}" >
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="check in">Check In</label>

                            <input type="text" class="form-control" name="check_in" placeholder= "" value="{{ old('check_in', $reservation->check_in) }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="check out">Check Out</label>
                            <input type="text" class="form-control" name="check_out" placeholder="" value="{{ old('check_out', $reservation->check_out) }}">
                        </div>
                    </div>

                    <div class="col-sm-4">
                    <div class="form-group">
                            {{Form::file('recipt_image')}}   
                        </div>
                    </div>

                </div>
                <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                {!! Form::close() !!}
        </div>
    </div>
    <form action="{{ route('reservations.destroy', $reservation->ReservationId) }}" method="POST">
        @method('DELETE')
        @csrf
        <p class="text-right">
            <button type="submit" class="btn btn-sm text-danger">Delete reservation</button>
        </p>
    </form>
</div>
@endsection