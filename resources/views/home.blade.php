@extends('adminlte::page')

@section('content_header')
    <h1>Welcome, {{Auth::user()->name}}.</h1>
@stop

@section('content')
    <p></p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
