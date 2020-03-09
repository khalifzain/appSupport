@extends('adminlte::page')

@section('content_header')

    <h1>Tasks</h1>

@stop

@section('content')

<div class="row">
    <div class="col-md-4">
        <div class= "container p-3 my-3 border bg-light">
            <div class= "container p-3 mb-3 border bg-info">
                <h3 class="text-center font-weight-light">Highlights</h3>
            </div>

            <h5>Meetings</h5>

            @foreach($tasks as $task)

                @if($task->tasksCategory->name == 'Meeting' or $task->tasksCategory->name == 'Event')
                    <p class="container p-3 my-3 bg-danger text-white">&bull; &#8194; {{ $task->name }}</p>
                @endif

            @endforeach

            <h5>Tasks</h5>

            @foreach($tasks as $task)

                @if($task->tasksCategory->name == 'To-Do')
                    <p class="container p-3 my-3 bg-success text-white">&bull; &#8194; {{ $task->name }}</p>
                @endif

            @endforeach

            <h5>Unavailable</h5>

            @foreach($tasks as $task)

                @if($task->tasksCategory->name == 'MC' or $task->tasksCategory->name == 'AL')
                    <p class="container p-3 my-3 bg-primary text-white">&bull; &#8194; {{ $task->name }}</p>
                @endif

            @endforeach
        </div>
        <div class="container p-3 my-3 border bg-light">
            <h5 class="font-weight-light">Create Task</h5><br>
            {!! Form::open(['method'=>'POST', 'action'=>'TasksController@store']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class'=>'form-control', 'placeholder' => 'Insert task name here']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('description', 'Description:') !!}
                {!! Form::textarea('description', null, ['class'=>'form-control', 'placeholder'=>'Describe your task in details', 'rows'=>3]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('start_time', 'Start Time:') !!}
                {!! Form::datetime('start_time',\Carbon\Carbon::now()->format('d-m-Y H:i:s') ) !!}
            </div>
            <div class="form-group">
                {!! Form::label('start_time', 'Start Time:') !!}
                {!! Form::datetime('start_time',\Carbon\Carbon::now()->addDays(1)->format('d-m-Y H:i:s') ) !!}
            </div>
            <div class="form-group">
                {!! Form::label('taskscategory_id', 'Category:') !!}
                {!! Form::select('taskscategory_id', [''=>'Choose one'] +$tasksCategories, null,['class'=>'form-control'] ) !!}
            </div>
            <div class="form-group text-center p-3">
                {!! Form::submit('Create Task', ['class'=>'btn btn-primary']) !!}
            </div>
        </div>
    </div>
    <div class="col-md-8 container p-3 my-3 border bg-light">
    <div id='calendar'></div>
    </div>
</div>


@stop

@section('css')
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
@stop

@section('js')
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
<script>
    $(document).ready(function() {
        // page is now ready, initialize the calendar...
        $('#calendar').fullCalendar({
            // put your options and callbacks here
            events : [
                @foreach($tasks as $task)
                {
                    title : '{{ $task->name }}',
                    start : '{{ $task->start_time }}',
                    url : '{{ route('tasks.edit', $task->id) }}'
                },
                @endforeach
            ]
        })
    });


</script>
@stop
