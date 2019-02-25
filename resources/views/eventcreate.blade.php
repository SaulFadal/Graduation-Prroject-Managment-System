
@extends('Layouts.Default')
@section('content')
<form action="{{ route('event.store') }}" method="post">
        {{ csrf_field() }}
        event name:
        <br />
        <input class="form-control" type="text" name="name" />
        <br /><br />
        event description:
        <br />
        <textarea class="form-control" name="description"></textarea>
        <br /><br />
        Start time:
        <br />
        <input type="text" name="event_date" class="date" />
        
        <br /><br />
        <br /><br />
        
        <center> <input  class="btn btn-sm btn btn-success" type="submit" value="Save" /></center>
      </form>

  

@endsection

