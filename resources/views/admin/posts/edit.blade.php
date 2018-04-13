@extends('layouts.admin')

@section('content')

<div class="page-header">
    <h1>Edit Post</h1>      
</div>

    @include('includes.form_error')

    <div class="col-sm-3">
        @if($posts->photo_id)
        <img class="img-responsive img-circle" src="{{$posts->photo->file}}" alt="profile_image">
        @else
        No Profile Image
        @endif
    </div>

<div class="col-sm-9">

    {!! Form::model($posts,['method' => 'PATCH','action'=>['AdminPostsController@update',$posts->id],'files'=>true]) !!}

            <div class="form-group">
                {!!Form::label('title', 'Title')!!}
                {!!Form::text('title',null,['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!!Form::label('category', 'Category')!!}
                {!!Form::select('category_id',$category,null,['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!!Form::label('body', 'Body')!!}
                {!!Form::textarea('body',null,['class'=>'form-control','rows'=>10,'cols'=>40])!!}
            </div>

            <div class="form-group">
                {!!Form::label('picture', 'Picture')!!}
                {!!Form::file('file',['id'=>'file'])!!}
            </div>

            <div class="form-group">
                {!!Form::submit('Update Post',['class'=>'btn btn-primary'])!!}
            </div>

        {!! Form::close() !!}
</div>
@stop