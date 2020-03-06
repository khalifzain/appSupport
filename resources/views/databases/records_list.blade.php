@extends('adminlte::page')

@section('content')

<h1>All Records</h1>

<table class="table">
    <thead>
        <tr>
            @foreach($columns as $column)
                <th>{{$column}}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @if($records)
            @foreach($records as $record)
                <tr>
                    @foreach($record as $row)
                        <td>{{$row ? $row : 'NULL'}}</td>
                    @endforeach
                    <td>
                    <a href={{route('records.edit', ['db_name'=>$db_name, 'table_name'=>$table_name, 'record_id'=>$record->id])}}>
                    <div class="form-group">
                        {!! Form::submit('Edit', ['class'=>'btn btn-info']) !!}
                    </div>
                     {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        @else
            <h1>No tables in this database</h1>
        @endif
    </tbody>
</table>

@stop
