@extends('adminlte::page')

@section('content_header')

    <h1>Tasks</h1>


    {{-- {{var_dump($tasks->pluck('taskscategory_id')->toArray())}} --}}
    {{var_dump($tasksCategories)}}
    {{var_dump($tasks->pluck('taskscategory_id')->toArray())}}
    {{var_dump(in_array(implode(array_keys($tasksCategories, 'Meeting')), $tasks->pluck('taskscategory_id')->toArray()))}}
    {{var_dump(implode(array_keys($tasksCategories, 'Meeting')))}}
    {{var_dump(in_array(implode(array_keys($tasksCategories, 'Meeting')), $tasks->pluck('taskscategory_id')->toArray()) or in_array(implode(array_keys($tasksCategories, 'Events')), $tasks->pluck('taskscategory_id')->toArray()))}}

@stop

@section('content')

<div class="row">
    <div class="col-md-4">
        <div class= "container p-3 my-3 border bg-light">
            <div class= "container p-3 mb-3 border bg-info">
                <h3 class="text-center font-weight-light">Highlights</h3>
            </div>

            <h5>Meetings</h5>
            @if(in_array(array_keys($tasksCategories, 'Meeting',''), $tasks->pluck('taskscategory_id')->toArray()) or in_array(array_keys($tasksCategories, 'Events'), $tasks->pluck('taskscategory_id')->toArray()) )
                @foreach($tasks as $task)
                    @if($task->tasksCategory()->name == 'Meeting' or $task->tasksCategory()->name == 'Events')
                        @if($task->start_time <= Carbon\Carbon::now() and $task->start_time >= Carbon\Carbon::now()->subDays(3) )
                            @if($task->end_time >= Carbon\Carbon::now())
                                <p class="container p-3 my-3 bg-danger text-white">&bull; &#8194; {{ $task->name }}</p>
                            @endif
                        @endif
                    @endif
                @endforeach
             @else
                <p class="container p-3 my-3 bg-danger text-white">&bull; &#8194; NONE</p>
             @endif

            <h5>To-Do</h5>
            @if(in_array(array_keys($tasksCategories, 'To-Do'), $tasks->pluck('taskscategory_id')->toArray()))
                @foreach($tasks as $task)
                    @if($task->tasksCategory()->name == 'To-Do')
                        @if($task->start_time <= Carbon\Carbon::now() and $task->start_time >= Carbon\Carbon::now()->subDays(3) )
                            @if($task->end_time >= Carbon\Carbon::now())
                                <p class="container p-3 my-3 bg-success text-white">&bull; &#8194; {{ $task->name }}</p>
                            @endif
                        @endif
                    @endif
                @endforeach
            @else
                <p class="container p-3 my-3 bg-success text-white">&bull; &#8194; NONE</p>
            @endif

            <h5>Unavailable</h5>
            @if(in_array(3, $tasks->pluck('taskscategory_id')->toArray()) or in_array(4, $tasks->pluck('taskscategory_id')->toArray()))
                @foreach($tasks as $task)
                    @if($task->taskscategory_id == 3 or $task->taskcategory_id == 4)
                        <p class="container p-3 my-3 bg-primary text-white">&bull; &#8194; {{ $task->name }}</p>
                    @endif
                @endforeach
            @else
                <p class="container p-3 my-3 bg-primary text-white">&bull; &#8194; NONE</p>
            @endif
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
                {!! Form::label('taskscategory_id', 'Category:') !!}
                {!! Form::select('taskscategory_id', [''=>'Choose one'] +$tasksCategories, 1,['class'=>'form-control'] ) !!}
            </div>
            <div class="form-group">
                {!! Form::label('start_time', 'Start Time:') !!}<br>
                <div class="input-group date" id="start_time_picker" data-target-input="nearest">
                    {!! Form::text('start_time', null, ['class'=>'form-control datetimepicker-input', 'data-target'=>'#start_time_picker']) !!}
                        <div class="input-group-append" data-target="#start_time_picker" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('end_time', 'End Time:') !!}<br>
                <div class="input-group date" id="end_time_picker" data-target-input="nearest">
                    {!! Form::text('end_time', null, ['class'=>'form-control datetimepicker-input', 'data-target'=>'#end_time_picker']) !!}
                        <div class="input-group-append" data-target="#end_time_picker" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                </div>
            </div>
            <div class="form-group text-center p-3">
                {!! Form::submit('Create Task', ['class'=>'btn btn-primary', 'id'=>'submit']) !!}
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

@stop

@section('js')
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
{{-- <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>
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
                    end : '{{ $task->end_time }}',
                    url : '{{ route('tasks.edit', $task->id) }}'
                },
                @endforeach
            ]
        })
    });
</script>

<script>
    $(function () {
      $('#start_time_picker').datetimepicker();
    });
</script>


<script>
    $(function () {
      $('#end_time_picker').datetimepicker();
    });
</script>

@stop
