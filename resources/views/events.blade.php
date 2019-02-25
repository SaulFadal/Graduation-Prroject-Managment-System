
@extends('Layouts.Default2')

@section('content')
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />

<h3>Calendar</h3>

<div id='calendar'></div>

<a href="{{url('event/create')}}"><button class="btn btn-sm btn btn-success"> Add an event</button></a>


@endsection



