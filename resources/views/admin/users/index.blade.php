@extends('layouts.admin')
@section('content')
    <h1 id="admin">User List</h1>
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
            <th scope="col">Action</th>
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
            </td>
          </tr>
          @endforeach
         @endif
        </tbody>
      </table>
@stop