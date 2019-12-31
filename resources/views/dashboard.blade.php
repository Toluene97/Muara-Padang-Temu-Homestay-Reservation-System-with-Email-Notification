@extends('layouts.app')

@section('content')
<div class="container">
    {{-- @include('viewUserReservation') --}}
    <div class="row justify-content-center">
        <div class="col-md-8">
            &nbsp;
            <div class="card" style="width: 50rem;">
                <div class="card-header">Your Reservation</div>
                <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{-- @if(count($posts)>0)
                    @endif --}}
                    @if($reservation->count() > 0)
                        <table class="table mt-3">
                            <thead>
                                <tr>
                                <th scope="col">House</th>
                                <th scope="col">Check In</th>
                                <th scope="col">Check out</th>  
                                <th scope="col">Guests</th>
                                <th scope="col">Price</th>
                                <th scope="col">Status</th>
                                <th scope="col">Manage</th>
                                <th scope="col">View Receipt</th>
                                <th scope="col">Submit Receipt</th>
                                </tr>
                            </thead>
                            <tbody>
{{-- 
"Trying to get property of non-object" error is occurred while trying to access an array as an object. 
Make sure all the retrieved data from table are not array. 
--}}
                                @foreach ($reservation as $reservations)
                                <tr>
                                    {{-- <td>{{ $reservations->house['name'] }}</td> --}}
                                    <td>{{ $reservations->houses->name }}</td>
                                    <td>{{ $reservations->check_in }}</td>
                                    <td>{{ $reservations->check_out }}</td>
                                    <td>{{ $reservations->num_of_guests }}</td>
                                    <td>{{ $reservations->final_price }}</td>
                                    <td>{{ $reservations->status }}</td>
    {{-- add status on database --}}
                                    <td><a href="/dashboard/reservations/{{ $reservations->ReservationId }}/edit" class="btn btn-sm btn-success">Edit</a></td>
                                    {{-- <td><a href="/dashboard/reservations/{{ $reservations->ReservationId }}/upload" class="btn btn-link">Upload Recipt </a></td>   --}}
                                    {{-- <td>{{ $reservations->recipt_image }}</td> --}}
                                    <td><div class="zoom">
                                        <img style="width:100%" src="/storage/recipt_image/{{$reservations->recipt_image}}">
                                    </div></td>
                                    <td><a href="/dashboard/reservations/{{ $reservations->ReservationId }}/uploadReceipt" class="btn btn-sm btn-success">Submit Receipt</a></td>
                                    
                                    
                                            {{-- <div id="modal-wrapper" class="modal">
                                                    <form class="modal-content animate">
                                                    {{ Form::open(['action'=>['ReservationController@upload',$reservations->ReservationId],'method'=>'POST','enctype'=>'multipart/form-data']) }}
                                                            
                                                    <div class="imgcontainer">
                                                        <span onclick="document.getElementById('modal-wrapper').style.display='none'" class="close" title="Close PopUp">&times;</span>
                                                        
                                                        <h1 style="text-align:center">Upload Your Receipt</h1>
                                                    </div>
                                                @foreach ($reservations as $reservation) 
                                                    <div class="container">
                                             
                                                                                               
                                                        <p> House : <input type="text" class="form-control" disabled name="HouseId" value="{{ old('HouseId',  $reservation->houses['name']) }}" ></p>
                                                        <p> Check In : <input type="text" class="form-control" disabled name="check_in" value="{{ old('check_in', $reservation->check_in) }}" ></p>
                                                        <p> Check Out : <input type="text" class="form-control" disabled name="check_out" value="{{ old('check_out', $reservation->check_out) }}" ></p>
                                                        <p> Number Of Guests : <input type="text" class="form-control" disabled name="num_of_guests" value="{{ old('num_of_guests', $reservation->num_of_guests) }}" ></p>
                                                        <p> Price : <input type="text" class="form-control" disabled name="final_price" value="{{ old('final_price', $reservation->final_price) }}" ></p>

                                                        <div class="form-group">
                                                                {{Form::file('recipt_image')}}   
                                                            </div>       
                                                        <button type="submit">Submit</button>

                                                       
                                                    </div>
                                                     @endforeach
                                                    </form>
                                                    
                                                </div> --}}


                                        </td>
    {{-- tukar submit recipt direction  --}}
                                </tr>
                                @endforeach          
                            </tbody>
                        </table>
                    @else
                        <p>You have no reservation.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
            // If user clicks anywhere outside of the modal, Modal will close
            
            var modal = document.getElementById('modal-wrapper');
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
            </script>


    @include('newDashboard')
    

</div>
@endsection
