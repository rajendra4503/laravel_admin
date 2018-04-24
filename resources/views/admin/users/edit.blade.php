@extends('layouts.admin')
@section('content')

    <div class="page-header">
        <h1>Edit User</h1>      
    </div>

    <div class="col-sm-3">
      
        <img class="img-responsive img-circle" src="{{ $users->photo ? $users->photo->file: 'http://placehold.it/400x400'}}" alt="profile_image">
       
    </div>

<div class="col-sm-9">

    @include('includes.form_error')
        {!! Form::model($users,['method' => 'PATCH','action'=>['AdminUsersController@update',$users->id],'files'=>true]) !!}

            <div class="form-group">
                {!!Form::label('name', 'Name')!!}
                {!!Form::text('name',null,['class'=>'form-control','id'=>'name','placeholder'=>'Enter your name'])!!}
            </div>
            <div class="form-group">
                {!!Form::label('email', 'Email')!!}
                {!!Form::text('email',null,['class'=>'form-control','id'=>'email','placeholder'=>'Enter your email'])!!}
            </div>

            <div class="form-group">
                {!!Form::label('role_id', 'Role')!!}
                {!!Form::select('role_id',$roles,null,['class'=>'form-control','id'=>'role'])!!}
            </div>

            <div class="form-group">
                {!!Form::label('is_active', 'Status')!!}
                {!!Form::select('is_active',[0=>'Not Active',1=>'Active'],null,['class'=>'form-control','id'=>'status'])!!}
            </div>

            <div class="form-group">
                {!!Form::label('password', 'Password')!!}
                {!!Form::password('password',['class'=>'form-control','id'=>'password'])!!}
            </div>

            <div class="form-group">
                {!!Form::label('picture', 'Picture')!!}
                {!!Form::file('file',['id'=>'file'])!!}
            </div>

            <div class="form-group">
                {!!Form::submit('Update User',['class'=>'btn btn-primary','id'=>'create_user'])!!}
            </div>

        {!! Form::close() !!}
</div>
@stop