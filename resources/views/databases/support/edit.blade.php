@extends('adminlte::page')

@section('content')

<h1>Edit</h1>

{{-- <div class="row">

        <div class="col-sm-3">
            @foreach($columns as $column)
            <p>{{$column ? $column : 'NULL'}}</p>
            @endforeach
        </div>

        <div class="col-sm-9">
            @foreach($records as $record)
            <div class="form-group">
                {!! Form::open(['method'=>'patch', 'action'=>['CodehackingDBController@recordsupdate',$value, $records->id]]) !!}
                {!! Form::text('$record', $record, ['class'=>'form-control'])!!}
                {!! Form::submit('Update', ['class'=>'btn btn-info']) !!}
                </div>
                {!! Form::close() !!}
            @endforeach
        </div>
</div> --}}




            @foreach($records as $record)
            <p>{{$record->keys()}}</p>
            <p>{{$record}}</p>
            @endforeach




@stop
