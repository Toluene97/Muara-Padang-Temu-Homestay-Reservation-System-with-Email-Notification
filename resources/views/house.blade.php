@extends('layouts.app')
@section('title', 'Houses')
@section('content')
<div class="container my-5">
    <div class="row">
        <!-- Loop through hotels returned from controller -->
        @foreach ($houses as $house)
        <div class="col-sm-4">
            <div class="card mb-3">
                {{-- <div style="background-image:url('{{ $hotel->image }}');height:300px;background-size:cover;" class="img-fluid" alt="Front of hotel"></div> --}}
                <div class="card-body">
                    <h5 class="card-title">{{ $house->name }}</h5>
                    
                    <small class="text-muted">{{ $house->price_weekday }}</small>
                    <small class="text-muted">{{ $house->capacity }} people</small>
                    <p class="card-text">{{ $house->detail }}</p>
                    {{-- <p class="card-text">{{ $house->reservation['id'] }}esdes</p> --}}
                    <a href="/dashboard/reservations/create/{{ $house->id }}" class="btn btn-primary">Book Now</a>
                </div>
            </div>  
        </div>
        @endforeach
    </div>

    {{-- @include('calendar') --}}
</div>
@endsection