@extends('adminlte::page')

@section('content')

<h1>All Tables</h1>

<table class="table">
    <thead>
        <tr>
            <th>Name</th>
        </tr>
    </thead>
    <tbody>
        @if($tables)
            @foreach($tables as $table)
                @foreach($table as $key => $value)
        <tr>
            <td><a href={{route('support.show', $value)}}>{{$value}}</td>
        </tr>
                @endforeach
            @endforeach
        @else
            <h1>No tables in this database</h1>
        @endif
    </tbody>
</table>







@stop
