@extends('Layouts.default')

@section('content')

<h1>Updating proposal</h1>

<hr />


{!! Form::open(['action'=> ['ProposalsController@update',$proposal->id], 'method'=>'POST' ]) !!}

{{Form::hidden('_method','PUT')}}

<div class="form-group">
{{Form::label('Title')}}
{{Form::text ('Title',$proposal->title,['placeholder'=> 'Enter proposal title', 'class'=>'form-control' ])}}
</div>

<div class="form-group">
{{Form::label('Describtion')}}
{{Form::textarea ('Describtion',$proposal->describtion,['placeholder'=> 'Enter describtion of proposal', 'class'=>'form-control' ])}}
</div>

<div class="form-group">
{{Form::label('requiredResources')}}
{{Form::textarea ('requiredResources',$proposal->requiredResources,['placeholder'=> 'Enter requiredResources of proposal', 'class'=>'form-control' ])}}
</div>

<div class="form-group pull-right">
{{Form::submit ('Update', ['class'=> 'btn btn-primary'])}}
</div>
{!! Form::close() !!}
<br><br><br>
@endsection