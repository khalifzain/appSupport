@extends('adminlte::page')

@section('content_header')
    <h1>{{Auth::user()->name}}'s Profile</h1>
@stop


@section('content')

<div>
    <div class="col-sm-3">
        <img src="{{$user->photo ? $user->photo->path : 'http://www.stleos.uq.edu.au/wp-content/uploads/2016/08/image-placeholder.png'}}" alt="" height="300" class="img-responsive img-rounded">
    </div>

    <div class="col-sm-9">

        {!! Form::model($user, ['method'=>'PATCH', 'action'=>['UserProfileController@update', $user->id], 'files'=>true, 'enctype'=>'multipart/form-data']) !!}

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
            {!! Form::select('roles[]', $roles, $userRole, array('class' => 'form-control')) !!}
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
            {!! Form::submit('Update User', ['class'=>'btn btn-primary col-sm-3 ']) !!}
        </div>

        {!! Form::close() !!}

    </div>

</div>


@stop
