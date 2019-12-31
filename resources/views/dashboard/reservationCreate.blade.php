@extends('layouts.app')
@section('title', 'Create reservation')
@section('content')

{{-- <script type="text/javascript" src="date.js"></script>
<script type="text/javascript">
    var minutes = 1000*60;
    var hours = minutes*60;
    var days = hours*24;

    var foo_date1 = getDateFromFormat("02/10/2009", "M/d/y");
    var foo_date2 = getDateFromFormat("02/12/2009", "M/d/y");

    var diff_date = Math.round((foo_date2 - foo_date1)/days);
    alert("Diff date is: " + diff_date );
</script> --}}

<div class="container my-5">
    <div class="card">
        <div class="card-header">
            <h2>{{ $houseInfo->name }} - <small class="text-muted">{{ $houseInfo->detail }}</small></h2>
        </div>
        <div class="card-body">
            <h5 class="card-title"></h5>
            <p class="card-text">Book your stay now at the most magnificent Homestay in the world!</p>
            {{-- <form action="{{ route('reservations.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-8">
                           
                        <div class="form-group">
                            <label for="house">House Type</label>
                            
                            
                            <select class="form-control" name="HouseId" >
                                <option value="1">Marriott</option>
                                <option value="2">Sutra</option>
                                <option value="3">Maya</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="check in">Check In</label>
                         
                            <input type="date" class="form-control" name="check_in" placeholder="">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="check out">Check Out</label>
                            <input type="date" class="form-control" name="check_out" placeholder="03/23/2020">
                        </div>
                    </div>
 
                    <div class="col-sm-4">
                            <div class="form-group">
                                <label for="guests">Number of guests</label>
                                <input class="form-control" name="num_of_guests" placeholder="1">
                            </div>
                    </div>
                    <div class="col-sm-3">
                    <div class="form-group">
                            <label for="check out">Price</label>
                            <input type="text" class="form-control" name="final_price" placeholder="RM">
                    </div>
                    </div>
                    

                </div>
                <button type="submit" class="btn btn-lg btn-primary">Book it</button>
            </form> --}}

{{-- ///////// --}}
            
            <div class="panel-body"> 
                {!! Form::open(array('route' => 'reservations.add','method'=>'POST','files'=>'true' ,'enctype'=>'multipart/form-data')) !!}
                <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    @if (Session::has('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @elseif (Session::has('warnning'))
                        <div class="alert alert-danger">{{ Session::get('warnning') }}</div>
                    @endif

                </div>

                {{-- {{ Form::hidden('HouseId', 'HouseId', array('id' => 'HouseId')) }} --}}
                <input type="hidden" value="{{$houseInfo->id}}" name="HouseId">
                {{-- <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    {!! Form::label('HouseId','House Name:') !!}
                    <div class="">
                    {!! Form::text('HouseId', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('HouseId', '<p class="alert alert-danger">:message</p>') !!}
                    </div>
                </div>
                </div> --}}
                <input type="hidden" value="Pending" name="status">

                {{-- ,['onchange'=>"calcDiff()"] --}}
                
                <div class="col-xs-3 col-sm-3 col-md-3">
                <div class="form-group">
           
                    {!! Form::label('check_in','Start Date:') !!}
                    <div class="">
                    {!! Form::text('check_in', null, ['class' => 'form-control'],['onchange'=>"calcDiff()"]) !!}
                    {{-- <input type="text"
                        class="datepicker-here form-control"
                        data-language='en'
                        name="check_in"
                        id="check_in"   
                        data-position='top left'/> --}}
                        {{-- <input type="text" id="check_in" placeholder="Enter check in date"> --}}
                    {!! $errors->first('check_in', '<p class="alert alert-danger">:message</p>') !!}
                    </div>
                </div>
                </div>

                <div class="col-xs-3 col-sm-3 col-md-3">
                <div class="form-group">
                    {!! Form::label('check_out','End Date:') !!}
                    <div class="">
                    {!! Form::text('check_out', null, ['class' => 'form-control'],['onchange'=>"calcDiff()"]) !!}
                    {{-- <input type="text"
                        class="datepicker-here form-control"
                        data-language='en'
                        name="check_out"
                        id="check_out"                     
                        
                        data-position='top left'/> --}}
                        {{-- <input type="text" id="check_out" placeholder="Enter check out date"> --}}
                        
                    {!! $errors->first('check_out', '<p class="alert alert-danger">:message</p>') !!}
                    </div>
                </div>
                </div>

                

                <div class="col-xs-3 col-sm-3 col-md-3">
                <div class="form-group">
                    {!! Form::label('num_of_guests','num of guests:') !!}
                    <div class="">
                    {!! Form::text('num_of_guests', null, ['class' => 'form-control']) !!}
                    {{-- <input type="number" id="num_of_guests" class="form-control" max="9" > --}}
                    {!! $errors->first('num_of_guests', '<p class="alert alert-danger">:message</p>') !!}
                    </div>
                </div>
                </div>

                <div class="col-xs-3 col-sm-3 col-md-3">
                <div class="form-group">
                    {!! Form::label('final_price','Price:') !!}
                    <div class="">
                    {!! Form::text('final_price', null, ['class' => 'form-control','readonly']) !!}
                    {{-- <input type="text" id="final_price" class="form-control" disabled> --}}
                    {!! $errors->first('final_price', '<p class="alert alert-danger">:message</p>') !!}
                    </div>
                </div>
                </div>

                {{-- <div class="form-group">
                    {{Form::file('recipt_image')}}   <!-- cover_image is the name -->
                </div> --}}

                
                <div class="col-xs-1 col-sm-1 col-md-1 text-center"> &nbsp;<br/>
                  {!! Form::submit('Add Reservation',['class'=>'btn btn-primary']) !!}

                  {{-- <button type="submit" class="btn btn-lg btn-primary">Book it</button> --}}
                  {{-- <button onclick="calcDiff()" class="btn btn-lg btn-primary"> Add Reservation</button> --}}
                  
                </div>
                </div>
               {!! Form::close() !!}
            </div>

            
        </div>
    </div>
</div>
@endsection