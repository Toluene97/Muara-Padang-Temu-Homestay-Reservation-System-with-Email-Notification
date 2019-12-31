@extends('layouts.app') 

@section('content')
    <h1>Edit Post </h1>
    {{ Form::open(['action'=>['PostsController@update',$post->id],'method'=>'POST','enctype'=>'multipart/form-data']) }}      <!-- PostController need to be array-->
        <div class= "form-group">
            {{Form::label('title','Title')}}
            {{Form::text('title',$post->title,['class'=>'form-control','placeholder'=>'Title'])}}   <?the title is the name which we refer. '' is where the value will be?>
            </div>   
        <div class= "form-group">
            {{Form::label('body','Body')}}
            {{Form::textarea('body',$post->body,['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Write Here'])}}

        </div> 
        <div class="form-group">
                {{Form::file('cover_image')}}   <!-- cover_image is the name -->
        </div>

    {{Form::hidden('_method','PUT')}}       <!-- PUT sebab nk update. type "php artisan route:list" . -->    

    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {{ Form::close() }}
@endsection
  