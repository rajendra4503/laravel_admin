@extends('layouts.admin')
@section('content')
<div class="page-header">Media List</div>


<table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Photo</th>
        <th scope="col">Created</th>
        <th scope="col">Updated</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($photos as $photo)
      <tr>
        <th scope="row">{{$photo->id}}</th>
        <td><img class="img-circle" width='50' height="50" src="{{$photo->file ? $photo->file : 'http://placehold.it/400x400' }} " alt="">  
        </td>
        <td>{{ date('Y-m-d H:i:s a',strtotime($photo->created_at))}}</td>
        <td>{{ date('Y-m-d H:i:s a',strtotime($photo->updated_at))}}</td>
        <td>
        {{ Form::open(['method' => 'DELETE', 'action' => ['AdminMediaController@destroy', $photo->id],'style'=>'display:inline']) }}
        {{ Form::hidden('id', $photo->id) }}
        {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) }}
        {{ Form::close() }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <div class="pagination_item">
    {!! $photos->render() !!}
</div>
@stop