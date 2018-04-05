@extends('layouts.admin')
@section('content')
<h1 class="page-header">Post List</h1>
<table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Photo</th>
        <th scope="col">User</th>
        <th scope="col">Category</th>
        <th scope="col">Title</th>
        <th scope="col">Body</th>
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
        <td>Edit | Delete | View</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <div class="pagination_item">
        {!! $posts->render() !!}
</div>
@stop