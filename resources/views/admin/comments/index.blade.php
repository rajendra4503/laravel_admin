@extends('layouts.admin')
@section('content')

    @if ($message = Session::get('message'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @if(count($comments) > 0)
        <h1>Comments</h1>
        <table class="table table-bordered">
       <thead>
         <tr>
            <th>id</th>
            <th>Author</th>
            <th>Email</th>
            <th>Body</th>
            <th style="width:200px;">Action</th>
          </tr>
        </thead>
        <tbody>
        @foreach($comments as $comment)
          <tr>
              <td>{{$comment->id}}</td>
              <td>{{$comment->author}}</td>
              <td>{{$comment->email}}</td>
              <td>{{$comment->body}}</td>
            <td>
                <a class="btn btn-info btn-sm" href="{{route('home.post',$comment->post->id)}}">View Post</a>
            
                <a class="btn btn-info btn-sm" href="{{route('admin.comment.replies.show', $comment->id)}}">View Replies</a>
          

                  @if($comment->is_active == 1)

                      {!! Form::open(['method'=>'PATCH', 'action'=> ['PostCommentsController@update', $comment->id]]) !!}

                      <input type="hidden" name="is_active" value="0">


                           <div class="form-group">
                               {!! Form::submit('Un-approve', ['class'=>'btn btn-success btn-sm']) !!}
                           </div>
                      {!! Form::close() !!}


                      @else



                      {!! Form::open(['method'=>'PATCH', 'action'=> ['PostCommentsController@update', $comment->id]]) !!}


                      <input type="hidden" name="is_active" value="1">


                      <div class="form-group">
                          {!! Form::submit('Approve', ['class'=>'btn btn-info btn-sm']) !!}
                      </div>
                      {!! Form::close() !!}




                  @endif



             


                  {!! Form::open(['method'=>'DELETE', 'action'=> ['PostCommentsController@destroy', $comment->id]]) !!}


                  <div class="form-group">
                      {!! Form::submit('Delete', ['class'=>'btn btn-danger btn-sm']) !!}
                  </div>
                  {!! Form::close() !!}



              </td>


          </tr>


            @endforeach

       </tbody>
     </table>
     <div class="pagination_item">
            {!! $comments->render() !!}
    </div>



        @else


        <h1 class="text-center">No Comments</h1>



    @endif


@stop