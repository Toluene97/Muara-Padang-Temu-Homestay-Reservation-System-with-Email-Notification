@extends('layouts.app') 

@section('content')
    <h1>Posts  </h1>
    @if (count ($reservations)>0)
        @foreach ($reservations as $reservation)
            <div class= "well">
                <div class="row">
                    <div class="col-md-8 col-sm-8">
                        <h3><a href ="/reservation/{{$reservation->ReservationId}}">{{$reservation->check_in}}</a></h3>
                        {{-- <small>Writen on {{$post->created_at}}<b> by {{$post->user->name}}</b></small> --}}
                    </div>
                </div>
            </div>
        @endforeach
        {{-- {{$posts->links()}}          --}}
    @else
        <p>No Post found</p>
    @endif
        
@endsection
