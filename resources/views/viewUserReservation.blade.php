<div class="row justify-content-center">
        <div class="col-md-8">
            &nbsp;
            <div class="card">
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
                                <th scope="col">Submit Recipt</th>
                                </tr>
                            </thead>
                            <tbody>
{{-- 
"Trying to get property of non-object" error is occurred while trying to access an array as an object. 
Make sure all the retrieved data from table are not array. 
--}}
                                @foreach ($reservation as $reservations)
                                <tr>
                                    <td>{{ $reservations->house['name'] }}</td>
                                    {{-- <td>{{ $reservations->house->name }}</td> --}}
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
