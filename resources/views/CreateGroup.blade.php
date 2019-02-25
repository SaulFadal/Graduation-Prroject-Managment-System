@extends('Layouts.Default')


@section('content')



<div class="card-body">

<ul class="nav nav-tabs nav-tabs-primary justify-content-center">
  <li class="nav-item">
    <a class="nav-link active" data-toggle="tab" href="#linka">
      Students
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#linkb">
      Request status
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#linkc">
      My requests
    </a>
  </li>
</ul>

<!-- First view -->
<div class="tab-content tab-subcategories">
  <div class="tab-pane active" id="linka">
    <div class="table-responsive">
      <table class="table tablesorter " id="plain-table">
      <thead class=" text-primary">
        <th>
          ID
        </th>
        <th>
          Name
        </th>
        <!-- <th>
          Proposed by
        </th> -->
        <th>
        </th>
      </thead>
      <tbody>
      @foreach($students as $student)    
        <tr>
          <td>{{$student->id}}</td>
           <td>{{$student->last_name}} ,{{$student->first_name}}</td>
           <td> {!! Form::open(['action'=> 'CreateGroupController@store', 'method'=>'POST' ]) !!}
           {!! Form::hidden('StudentID', $student->id) !!}
           {{Form::submit ('Send request', ['class'=> 'btn btn-primary'])}} 
           {!! Form::close() !!}
           </td>
           <td><a href="{{ url('proposals/details') }}" class= text-primary>Details</a></td>
        </tr> 
         @endforeach
      </tbody>
    </table>
    </div>
  </div>

  <!-- Second view -->
  <div class="tab-pane" id="linkb">
  <div class="table-responsive">
      <table class="table tablesorter " id="plain-table">
      <thead class=" text-primary">
        <th>
          Request ID
        </th>
        <th>
          Student ID
        </th>
        <!-- <th>
          Proposed by
        </th> -->
        <th>
          Status
        </th>
      </thead>
      <tbody>
      @foreach($Myreq as $Myreq)

        <tr>
          <td>{{$Myreq->id}}</td>
           <td>{{$Myreq->last_name}}, {{$Myreq->first_name}}</td>
           @if($Myreq->status==3)
           <td>Pending </td>
           @elseif($Myreq->status==2)
          <td>Refused</td>
          @elseif($Myreq->status==1)
          <td>Approved</td>
          @endif
        </tr> 
           
         @endforeach
      </tbody>
    </table>
    </div>
  </div>

  <!-- Third view -->
  <div class="tab-pane" id="linkc">
  <div class="table-responsive">
      <table class="table tablesorter " id="plain-table">
      <thead class=" text-primary">
        <th>
          ID
        </th>
        <th>
          Name
        </th>
        <!-- <th>
          Proposed by
        </th> -->
        <th>
        </th>
      </thead>
      <tbody>
      @foreach($Myreq1 as $Myreq1)

        <tr>
          <td>{{$Myreq1->id}}</td>
           <td>{{$Myreq1->last_name}} ,{{$Myreq1->first_name}}</td>
           <td> {!! Form::open(['action'=> 'CreateGroupController@Approve', 'method'=>'POST' ]) !!}
           {!! Form::hidden('requestt_id', $Myreq1->id) !!}
           {!! Form::hidden('student_id', $Myreq1->STUID) !!}
           {{Form::submit ('ACCEPT', ['class'=> 'btn btn-primary'])}} 
           {!! Form::close() !!}
           </td>
           <td>
           {!! Form::open(['action'=> 'CreateGroupController@Reject', 'method'=>'POST' ]) !!}
           {!! Form::hidden('requestt_id', $Myreq1->id) !!}
           {!! Form::hidden('student_id', $Myreq1->STUID) !!}
           {{Form::submit ('REJECT', ['class'=> 'btn btn-danger'])}} 
           {!! Form::close() !!}
           </td>
        </tr> 
         
        @endforeach
      </tbody>
    </table>
    </div>
  </div>
</div>

@endsection