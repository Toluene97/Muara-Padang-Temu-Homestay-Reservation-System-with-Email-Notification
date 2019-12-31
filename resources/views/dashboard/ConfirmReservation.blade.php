@extends('layouts.app')
@section('title', 'Edit Reservation')
@section('content')
<div class="container2">
    <div class="card my-3">
        <div class="card-header">
            <h2>{{ $houseInfo->name }} - <small class="text-muted">{{ $houseInfo->detail }}</small></h2>
        </div>
        <div class="card-body">
            <h5 class="card-title"></h5>
            {{ Form::open(['action'=>['ReservationController@confirm',$reservation->ReservationId],'method'=>'POST','enctype'=>'multipart/form-data']) }}
            {{-- {!! Form::open(array('route' => 'reservations.upload',$reservation->ReservationId,'method'=>'POST','files'=>'true' ,'enctype'=>'multipart/form-data')) !!} --}}
            @csrf
            @method('PUT') 
            {{-- <div class="row"> --}}<div class="row justify-content-center">

                {{-- <div class="col-sm-6"> --}}
            {{-- <p> House : <input type="text" class="form-control" disabled name="HouseId" value="{{ old('HouseId',  $reservation->houses['name']) }}" ></p>
            <p> Check In : <input type="text" class="form-control" disabled name="check_in" value="{{ old('check_in', $reservation->check_in) }}" ></p>
            <p> Check Out : <input type="text" class="form-control" disabled name="check_out" value="{{ old('check_out', $reservation->check_out) }}" ></p>
            <p> Number Of Guests : <input type="text" class="form-control" disabled name="num_of_guests" value="{{ old('num_of_guests', $reservation->num_of_guests) }}" ></p>
            <p> Price : <input type="text" class="form-control" disabled name="final_price" value="{{ old('final_price', $reservation->final_price) }}" ></p>
                
            
            <td><div class="zoom">
                <img style="width:100%" src="/storage/recipt_image/{{$reservation->recipt_image}}">
            </div></td>  --}}
            
        {{-- </div> --}}

        <div class="col-sm-5">
            <div class="form-group">
                <p> House : <input type="text" class="form-control" disabled name="HouseId" value="{{ old('HouseId',  $reservation->houses['name']) }}" ></p>
            </div>
        </div>
        <div class="col-sm-5">
            <div class="form-group">
                <p> Number Of Guests : <input type="text" class="form-control" disabled name="num_of_guests" value="{{ old('num_of_guests', $reservation->num_of_guests) }}" ></p>
            </div>
        </div>

        <div class="col-sm-5">
            <div class="form-group">
                <p> Check In : <input type="text" class="form-control" disabled name="check_in" value="{{ old('check_in', $reservation->check_in) }}" ></p>
            </div>
        </div>

        <div class="col-sm-5">
            <div class="form-group">
                <p> Check Out : <input type="text" class="form-control" disabled name="check_out" value="{{ old('check_out', $reservation->check_out) }}" ></p>
            </div>
        </div>
        

        <div class="col-sm-5">
            <div class="form-group">
                <p> Price : <input type="text" class="form-control" disabled name="final_price" value="{{ old('final_price', $reservation->final_price) }}" ></p>
            </div>
        </div>

        <div class="col-sm-5">
            <div class="form-group">
                <p> Status : <select class="form-control">
                    <option value="Approved">Approve</option>
                    <option value="Reject">Reject</option>
                </select>
            </div>
        </div>

        <td><div class="center">
            <img style="width:100%" src="/storage/recipt_image/{{$reservation->recipt_image}}">
        </div></td> 

            </div> 
            
            <div class="row justify-content-center">
            <button type="submit" class="btn btn-lg btn-primary">Submit</button>
            {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection