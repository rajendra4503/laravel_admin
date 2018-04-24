@extends('layouts.admin')
@section('content')
<div class="page-header">Post List</div>

@if ($message = Session::get('success'))
  <div class="alert alert-success">
      <p>{{ $message }}</p>
  </div>
@endif
<table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Photo</th>
        <th scope="col">User</th>
        <th scope="col">Category</th>
        <th scope="col">Title</th>
        <th scope="col">Body</th>
        <th scope="col">Created</th>
        <th scope="col">Updated</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($posts as $post)
      <tr>
        <th scope="row">{{$post->id}}</th>
        <td><img class="img-circle" width='50' height="50" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400' }} " alt="">  
        </td>
        <td>{{$post->user->name}}</td>
        <td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
        <td>{{$post->title}}</td>
        <td>{{str_limit($post->body, 30)}}</td>
        <td>{{ date('Y-m-d H:i:s a',strtotime($post->created_at))}}</td>
        <td>{{ date('Y-m-d H:i:s a',strtotime($post->updated_at))}}</td>
        <td>
            <a href="{{route('home.post',$post->id)}}" class="btn btn-info btn-sm">
                <span class="glyphicon glyphicon-view"></span> view 
            </a>
          
          <a href="{{route('admin.posts.edit',$post->id)}}" class="btn btn-info btn-sm">
          <span class="glyphicon glyphicon-user"></span> Edit 
        </a>

        {{ Form::open(['method' => 'DELETE', 'action' => ['AdminPostsController@destroy', $post->id],'style'=>'display:inline']) }}
        {{ Form::hidden('id', $post->id) }}
        {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) }}
        {{ Form::close() }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <div class="pagination_item">
        {!! $posts->render() !!}
</div>
@stop