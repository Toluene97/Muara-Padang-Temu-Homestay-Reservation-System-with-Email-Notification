@extends('layouts.app') 

@section('content')
    <h1>Create Post </h1>
    {{ Form::open(['action'=>'PostsController@store','method'=>'POST','enctype'=>'multipart/form-data']) }}      <!-- enctype purpose is for submit the file . need to set to multipart form data -->
        <div class= "form-group">
            {{Form::label('title','Title')}}
            {{Form::text('title','',['class'=>'form-control','placeholder'=>'Title'])}}   <?the title is the name which we refer. '' is where the value will be?>
            </div>   
        <div class= "form-group">
            {{Form::label('body','Body')}}
            {{Form::textarea('body','',['class'=>'form-control','placeholder'=>'Write Here'])}}

        </div> 
        <div class="form-group">
            {{Form::file('cover_image')}}   <!-- cover_image is the name -->
        </div>

    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {{ Form::close() }}
@endsection
 