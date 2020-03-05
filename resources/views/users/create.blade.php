@extends('adminlte::page')

@section('content_header')
    <h1>Create User</h1>
@stop


@section('content')

        {!! Form::open(['method'=>'POST', 'action'=>'UsersController@store', 'files'=>true, 'enctype'=>'multipart/form-data']) !!}

        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('email', 'Email:') !!}
            {!! Form::text('email', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('role', 'Role:') !!}
            {!! Form::select('roles[]', $roles, null, array('class' => 'form-control')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('password', 'Password: ') !!}
            {!! Form::password('password', ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('photo_id', 'Photo:') !!}
            {!! Form::file('photo_id', null, ['class'=>'form-control'])!!}
        </div>

        <div class="form-group">
            {!! Form::submit('Create User', ['class'=>'btn btn-primary col-sm-3 ']) !!}
        </div>

        {!! Form::close() !!}


@stop
