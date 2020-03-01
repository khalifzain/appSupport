@extends('adminlte::page')

@section('content')

<h1>All Data</h1>

<table class="table">
    <thead>
        <tr>
            @for($i = 0; $i < sizeof($columns); $i++)
              <th>{{ ucfirst(str_replace('_', ' ',$columns[$i]) )}}</th>
            @endfor
         </tr>
    </thead>
    <tbody>

        @foreach($records as $record)
            <tr>
                @foreach($record as $row)
                    <td>{{$row ? $row:NULL}}</td>
                @endforeach
                <td>
                    {!! Form::open(['method'=>'PATCH', 'action'=>['CodehackingDBController@records',$value, $record->id]]) !!}

                        <div class="form-group">
                            {!! Form::submit('Edit', ['class'=>'btn btn-info']) !!}
                        </div>

                    {!! Form::close() !!}

                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@stop
