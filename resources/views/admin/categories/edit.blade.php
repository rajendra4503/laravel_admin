@extends('layouts.admin')
@section('content')
    <div class="page-header">
        <h1>Edit Category</h1>
    </div>

<div class="col-sm-6">

    {!! Form::model($category,['method' => 'PATCH','action'=>['AdminCategories@update',$category->id],'files'=>true]) !!}

        <div class="form-group">
            {!!Form::label('name', 'Category')!!}
            {!!Form::text('name',null,['class'=>'form-control'])!!}
        </div>

        <div class="form-group">
            {!!Form::submit('Update Category',['class'=>'btn btn-primary'])!!}
        </div>

    {!! Form::close() !!}

</div>     
@stop 