@extends('adminlte::page')

@section('content_header')
    <h1>All Users</h1>
@stop


@section('content')

<table class="table">
    <thead>
    <tr>
        <th>Id</th>
        <th>Photo</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Created</th>
        <th>Updated</th>
    </tr>
    </thead>
    <tbody>
        @if($users)
            @foreach($users as $user)
    <tr>
        <td>{{$user->id}}</td>
        <td><img height="50" src="{{$user->photo ? $user->photo->path : 'http://www.stleos.uq.edu.au/wp-content/uploads/2016/08/image-placeholder.png'}}" alt=""></td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{!empty($user->role) ? $user->role->name :'No role assigned'}}</td>
        <td>{{$user->created_at->diffForHumans()}}</td>
        <td>{{$user->updated_at->diffForHumans()}}</td>
        <td><a href = "{{route('users.edit', $user->id)}}">

                <div class="form-group">
                    {!! Form::submit('Edit', ['class'=>'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}

        </td>
        <td>
            {!! Form::open(['method'=>'DELETE', 'action'=>['UsersController@destroy', $user->id]]) !!}
                <div class="form-group">
                    {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                </div>
            {!! Form::close() !!}

        </td>
    </tr>

            @endforeach
        @endif


    </tbody>
</table>

@stop
