@extends('layouts.admin')
@section('content')
    <div class="page-header">
        <h1>Category List</h1>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    @if ($message = Session::get('delete'))
    <div class="alert alert-danger">
        <p>{{ $message }}</p>
    </div>
    @endif
<div class="col-sm-6">

    {!! Form::open(['method' => 'post','action'=>'AdminCategories@store','files'=>true]) !!}

        <div class="form-group">
            {!!Form::label('name', 'Category')!!}
            {!!Form::text('name',null,['class'=>'form-control'])!!}
        </div>

        <div class="form-group">
            {!!Form::submit('Create Category',['class'=>'btn btn-primary'])!!}
        </div>

    {!! Form::close() !!}

</div> 

<div class="col-sm-6">
<table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Category</th>
            <th scope="col">Action</th>
          </tr>  
        </thead>
            <tbody>
            @foreach($categories as $category)
            <tr>
                <td scope="row">{{$category->id}}</ttd>
                <td scope="row">{{$category->name}}</td>
                <td>
                    <a href="{{route('admin.categories.edit',$category->id)}}" class="btn btn-info btn-sm">
                        <span class="glyphicon glyphicon-user"></span> Edit  
                    </a>
                        {{ Form::open(['method' => 'DELETE', 'action' => ['AdminCategories@destroy', $category->id],'style'=>'display:inline']) }}
                        {{ Form::hidden('id', $category->id) }}
                        {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) }}
                        {{ Form::close() }}
                    </td>
            </tr>
            @endforeach       
            </tbody>
      </table>
   </div>   
@stop 