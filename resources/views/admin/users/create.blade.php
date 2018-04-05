@extends('layouts.admin')
@section('content')
    <h1 class="page-header">Create User</h1>
    @include('includes.form_error')

        {!! Form::open(['method' => 'post','action'=>'AdminUsersController@store','files'=>true]) !!}

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
                {!!Form::select('role_id',[''=>'Select Role']+$roles,null,['class'=>'form-control','id'=>'role'])!!}
            </div>

            <div class="form-group">
                {!!Form::label('is_active', 'Status')!!}
                {!!Form::select('is_active',[0=>'Not Active',1=>'Active'],null,['class'=>'form-control','id'=>'status'])!!}
            </div>

            <div class="form-group">
                {!!Form::label('password', 'Password')!!}
                {!!Form::password('password',['class'=>'form-control','id'=>'password','placeholder'=>'Enter your password'])!!}
            </div>

            <div class="form-group">
                    {!!Form::label('picture', 'Picture')!!}
                    {!!Form::file('file',['id'=>'file'])!!}
            </div>

            <div class="form-group">
                {!!Form::submit('Create User',['class'=>'btn btn-primary','id'=>'create_user'])!!}
            </div>

        {!! Form::close() !!}
@stop