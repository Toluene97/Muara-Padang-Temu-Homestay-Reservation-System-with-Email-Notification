<div class="panel-body"> 
        {!! Form::open(array('route' => 'reservations.add','method'=>'POST','files'=>'true')) !!}
        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @elseif (Session::has('warnning'))
                <div class="alert alert-danger">{{ Session::get('warnning') }}</div>
            @endif

        </div>

        <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
            {!! Form::label('HouseId','House Name:') !!}
            <div class="">
            {!! Form::text('HouseId', null, ['class' => 'form-control']) !!}
            {!! $errors->first('HouseId', '<p class="alert alert-danger">:message</p>') !!}
            </div>
        </div>
        </div>
        
        <div class="col-xs-3 col-sm-3 col-md-3">
        <div class="form-group">
            {!! Form::label('check_in','Start Date:') !!}
            <div class="">
            {!! Form::date('check_in', null, ['class' => 'form-control']) !!}
            {!! $errors->first('check_in', '<p class="alert alert-danger">:message</p>') !!}
            </div>
        </div>
        </div>

        <div class="col-xs-3 col-sm-3 col-md-3">
        <div class="form-group">
            {!! Form::label('check_out','End Date:') !!}
            <div class="">
            {!! Form::date('check_out', null, ['class' => 'form-control']) !!}
            {!! $errors->first('check_out', '<p class="alert alert-danger">:message</p>') !!}
            </div>
        </div>
        </div>

        <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
            {!! Form::label('final_price','Price:') !!}
            <div class="">
            {!! Form::text('final_price', null, ['class' => 'form-control']) !!}
            {!! $errors->first('final_price', '<p class="alert alert-danger">:message</p>') !!}
            </div>
        </div>
        </div>

        <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
            {!! Form::label('num_of_guests','num of guests:') !!}
            <div class="">
            {!! Form::text('num_of_guests', null, ['class' => 'form-control']) !!}
            {!! $errors->first('num_of_guests', '<p class="alert alert-danger">:message</p>') !!}
            </div>
        </div>
        </div>
        
          <div class="col-xs-1 col-sm-1 col-md-1 text-center"> &nbsp;<br/>
          {!! Form::submit('Add Reservation',['class'=>'btn btn-primary']) !!}
          </div>
        </div>
       {!! Form::close() !!}
    </div>