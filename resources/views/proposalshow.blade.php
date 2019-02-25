@extends('Layouts.default')

@section('content')


<div>
   <h1>{{$proposal->title}} </h1> 
</div>

<div>
<h5>Proposal ID: {{$proposal->id}}</h5>
</div>

<div>
<h3>Describtion:</h3>
    <p>{{$proposal->describtion}}<p>
</div>

<div>
<h3>Required resources:</h3>
    <p>{{$proposal->requiredResources}}<p>
</div>

<!-- Check if the current user is the auther of this proposal -->
@if(Auth::user()->id == $proposal->supervisor->id) 
<div class='clearfix'>
<a href="/proposals/{{$proposal->id}}/edit" class="btn btn-default ">
<i class="material-icons"> edit</i> Edit proposal</a>
    <div class="pull-right">
    
    {!! Form::open(['action'=> ['ProposalsController@destroy', $proposal->id],'method'=>'POST'])    !!}

    {{Form::hidden('_method', 'DELETE')}}
<button class='btn btn-danger' type='submit'>
 <i class="material-icons">delete_forever </i> Delete proposal</button>

    {!! Form::close()!!}
    
    </div>
</div>
@endif

@if( Auth::user()->user_role == 2)
<br><br><br>

<hr>
@if($proposal->status == 1)


<button class='btn btn-primary' type='button' disabled>
<i class="class fas fa-trash"></i> APPROVED !</button>

@elseif($proposal->status == 0)

{!! Form::open(['action'=> 'ProposalsController@store', 'method'=>'POST' ]) !!}
        
        {!! Form::hidden('proposal_id', $proposal->id) !!}
        {!! Form::hidden('Button', 'Approve') !!}
        
        
        
        {{Form::submit ('Approve', ['class'=> 'btn btn-primary'])}} 
        {!! Form::close() !!}

@endif
        
<!-- REJECTING FORM -->
{!! Form::open(['action'=> 'ProposalsController@store', 'method'=>'POST' ]) !!}
        
        {!! Form::hidden('proposal_id', $proposal->id) !!}
        {!! Form::hidden('Button', 'Reject') !!}
        
        
        
        {{Form::submit ('Reject', ['class'=> 'btn btn-danger'])}} 
        {!! Form::close() !!}
@endif

@if(Auth::user()->user_role == 5)

{!! Form::open(['action'=> 'ProposalsController@store', 'method'=>'POST' ]) !!}
        
        {!! Form::hidden('proposal_id', $proposal->id) !!}
        {!! Form::hidden('Button', 'Approve') !!}
        
        
        
        {{Form::submit ('Choose proposal', ['class'=> 'btn btn-primary'])}} 
        {!! Form::close() !!}

        @endif

@endsection