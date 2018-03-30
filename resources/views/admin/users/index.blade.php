@extends('layouts.admin')
@section('content')
    <h1 id="admin">User List</h1>
    <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Status</th>
            <th scope="col">Created</th>
            <th scope="col">Updated</th>
          </tr>
        </thead>
        <tbody>
            @if($users)
            @foreach ( $users as $user )
          <tr>
            <th scope="row">1</th>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->role->name}}</td>
            <td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
            <td>{{ date('Y-m-d H:i:s a',strtotime($user->created_at))}}</td>
            <td>{{ date('Y-m-d H:i:s a',strtotime($user->updated_at))}}</td>
          </tr>
          @endforeach
         @endif
        </tbody>
      </table>
@stop