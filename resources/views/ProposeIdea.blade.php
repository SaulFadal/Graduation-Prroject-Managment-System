@extends('Layouts.Default')

@section('content')



<h1>Adding a proposal</h1>

<hr />
<br><br>
{!! Form::open(['action'=> 'ProposalsController@store', 'method'=>'POST' ]) !!}
<div class="form-group row">
{{Form::label('Title')}}
    <div class="col-md-6">
    {{Form::text ('Title','',['placeholder'=> 'Enter post name', 'class'=>' form-control' ])}}
    </div>
</div>
<br><br><br><br>
<div class="form-group row">
{{Form::label('Describtion')}}
    <div class="col-md-6">
    {{Form::text ('Describtion','',['placeholder'=> 'Enter proposal describtion', 'class'=>'form-control ' ])}}
    </div>
</div>
<br><br><br>

<div class="form-group row">
{{Form::label('requiredResources')}}
    <div class="col-md-6">  
    {{Form::textarea ('requiredResources','',['placeholder'=> 'Enter required resources', 'class'=>'  form-control'  ])}}
    </div>
</div>

<div class="form-group pull right">
{{Form::submit ('save', ['class'=> 'btn btn-primary'])}}
</div>
{!! Form::close() !!}

@endsection