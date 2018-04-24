@extends('layouts.admin')
@section('content')

<div class="page-header">
    <h1>Add Media</h1>
</div>

<div class="col-sm-12">

    {!! Form::open(['method' => 'post','action'=>'AdminMediaController@store','class'=>'dropzone','files'=>true]) !!}

        {{-- <div class="form-group">
                {!!Form::label('picture', 'Picture')!!}
                {!!Form::file('file',['id'=>'file'])!!}
        </div> --}}

        {{-- <div class="form-group">
                {!!Form::submit('Create Post',['class'=>'btn btn-primary'])!!}
        </div> --}}

    {!! Form::close() !!}

</div>     
@stop 