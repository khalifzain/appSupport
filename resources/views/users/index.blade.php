@extends('adminlte::page')

@section('content_header')
    <h1>All Users</h1>
@stop


@section('content')

<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
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
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{($user->roles->pluck('name'))->first() ? $user->roles->pluck('name')->first():'no role assigned'}}</td>
                    <td>{{$user->created_at->diffForHumans()}}</td>
                    <td>{{$user->updated_at->diffForHumans()}}</td>
                    <td><a href = "{{route('users.edit', $user->id)}}">

                        <div class="form-group">
                            {!! Form::submit('Edit', ['class'=>'btn btn-primary']) !!}
                        </div>
                    {!! Form::close() !!}

                </td>
                <td><a onclick="return deleteConfirmation();">
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
</div>
<div class="pagination justify-content-center">
{{$users->links()}}
</div>

@stop

<script>
    function deleteConfirmation()
    {
        if(!confirm("Are you sure that you want to delete this?"))
        event.preventDefault();
    }
</script>
