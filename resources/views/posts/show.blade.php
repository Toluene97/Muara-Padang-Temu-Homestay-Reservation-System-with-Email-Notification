@extends('layouts.app') 

@section('content')

    <a href="/posts" class="btn btn-default"> Go Back</a>
    <h1>{{$post->title}}  </h1>
    <img src="/storage/cover_images/{{$post->cover_image}}" style="width:100%">
    <div>
        {!!$post->body!!}    <!--  supaya nilai dia macam user letak bukan bahasa html cth:(BOLD) <strong>HEHEHE</strong>  -->
    </div>
    <hr>

    <small>Writen on {{$post->created_at}}<b> by {{$post->user->name}}</b></small>
    <hr>

    @if (!Auth::guest())    <!-- ni supaya unregister user xbole access -->
        @if (Auth::user()->id == $post->user_id)        <!-- ni supaya right user only can access,  == means user id (equal to) post user_id -->
            <a href= "/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>
    
            {!!Form::open(['action'=>['PostsController@destroy',$post->id],'method'=>'POST', 'class'=>'pull-right']) !!}
                {{Form::hidden('_method','DELETE')}}
                {{Form::submit('Delete',['class'=>'btn btn-danger'])}}    <!-- array of btn danger button-->
            {!!Form::close()!!}
        @endif
        
    @endif
    
@endsection