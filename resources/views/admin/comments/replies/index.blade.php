@extends('layouts.admin')
@section('content')

    @if ($message = Session::get('message'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @if(count($replies) > 0)
    <h1>Comments Replies</h1>
    <table class="table table-bordered">
       <thead>
         <tr>
            <th>id</th>
            <th>Author</th>
            <th>Email</th>
            <th>Body</th>
            <th>Post View</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        @foreach($replies as $replie)
          <tr>
              <td>{{$replie->id}}</td>
              <td>{{$replie->author}}</td>
              <td>{{$replie->email}}</td>
              <td>{{$replie->body}}</td>
            {{--  <td>
                <a href="{{route('home.post',$comment->post->id)}}">View Post</a>
            </td> 
            <td>
                <a href="{{route('admin.comment.replies.show', $comment->id)}}">View Replies</a></td>
            <td>  --}}

            <td>
 
                <a href="{{route('home.post',$replie->comment->post->id)}}" class="btn btn-info btn-sm">
                            <span class="glyphicon glyphicon-view"></span> view post 
            </a>
            </td>

            <td>

                  @if($replie->is_active == 1)

                      {!! Form::open(['method'=>'PATCH', 'action'=> ['CommentRepliesController@update', $replie->id]]) !!}
                      <input type="hidden" name="is_active" value="0">
                           <div class="form-group">
                               {!! Form::submit('Un-approve', ['class'=>'btn btn-success btn-sm']) !!}
                           </div>
                      {!! Form::close() !!}


                      @else
                      {!! Form::open(['method'=>'PATCH', 'action'=> ['CommentRepliesController@update', $replie->id]]) !!}
                      <input type="hidden" name="is_active" value="1">
                      <div class="form-group">
                          {!! Form::submit('Approve', ['class'=>'btn btn-info btn-sm']) !!}
                      </div>
                      {!! Form::close() !!}
                  @endif
              
                  {!! Form::open(['method'=>'DELETE', 'action'=> ['CommentRepliesController@destroy', $replie->id]]) !!}
                  <div class="form-group">
                      {!! Form::submit('Delete', ['class'=>'btn btn-danger btn-sm']) !!}
                  </div>
                  {!! Form::close() !!}
              </td>
          </tr>
            @endforeach
       </tbody>
     </table>
        @else
        <h1 class="text-center">No Replies</h1>
    @endif
@stop