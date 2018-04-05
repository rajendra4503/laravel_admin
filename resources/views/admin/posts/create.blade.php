@extends('layouts.admin')
@section('content')
<h1 class="page-header">Create Post</h1>

    @include('includes.form_error')

        {!! Form::open(['method' => 'post','action'=>'AdminPostsController@store','files'=>true]) !!}

            <div class="form-group">
                {!!Form::label('title', 'Title')!!}
                {!!Form::text('title',null,['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!!Form::label('category', 'Category')!!}
                {!!Form::select('category_id',[''=>'Chose Category']+$category,null,['class'=>'form-control'])!!}
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
                {!!Form::submit('Create Post',['class'=>'btn btn-primary'])!!}
            </div>

        {!! Form::close() !!}
@stop