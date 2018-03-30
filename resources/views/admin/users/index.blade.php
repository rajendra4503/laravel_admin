@extends('layouts.admin')
@section('content')
    <h1 id="admin">User List</h1>
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
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Status</th>
            <th scope="col">Created</th>
            <th scope="col">Updated</th>
            <th scope="col" width="140px">Action</th>
          </tr>
        </thead>
        <tbody>
      @if($users)
            @foreach ( $users as $user )
          <tr>
            <th scope="row">{{$user->id}}</th>
            <td>
                @if($user->photo_id)
                <img width="50" height="50" class="img-circle" src="{{$user->photo->file}}" alt="profile_image">
                @else
                No Profile Image
                @endif
          </td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->role->name}}</td>
            <td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
            <td>{{ date('Y-m-d H:i:s a',strtotime($user->created_at))}}</td>
            <td>{{ date('Y-m-d H:i:s a',strtotime($user->updated_at))}}</td>
            <td>
              <a href="{{route('admin.users.edit',$user->id)}}" class="btn btn-info btn-sm">
                <span class="glyphicon glyphicon-user"></span> Edit 
              </a>

              {{ Form::open(['method' => 'DELETE', 'action' => ['AdminUsersController@destroy', $user->id],'style'=>'display:inline']) }}
              {{ Form::hidden('id', $user->id) }}
              {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) }}
              {{ Form::close() }}

            </td>
          </tr>
          @endforeach
         @endif
        </tbody>
      </table>
      <div class="pagination_item">
          {!! $users->render() !!}
      </div>
@stop