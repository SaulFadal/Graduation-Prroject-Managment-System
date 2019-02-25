@extends('layouts.Default')

@section('content')



<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h2 class="card-title" align="center">{{$P_title}}</h2>
                  <p class="card-category">  </p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    

                   
                    @if($GroupNumber == 2)
                    
                    <table class="table">
                    <h3 align="center"> Group: {{$group1}} </h3>
                      <thead align="center" class=" card-header card-header-primary">
                        <th>
                          Student ID
                        </th>
                        <th>
                          Fist name
                        </th>
                        <th>
                          Last name
                        </th>
                        <th>
                          Department
                        </th>
                      </thead>

                      <tbody>
                      @foreach($group1Members as $group1Member)
                       <tr align="center">
                       <td> {{$group1Member->id}} </td>
                       <td> {{$group1Member->first_name}} </td>
                       <td>{{$group1Member->last_name}} </td>
                       <td>{{$group1Member->name}} </td>
                       </tr>
                       @endforeach
                      </tbody>

                    </table>
                    @if($Check == 1)
                    <button class='btn btn-inform' type='button' disabled>
                     Already finalized !</button>
                    @elseif($Check == 0)

                      {!! Form::open(['action'=> 'ProposalsController@FinalApprove', 'method'=>'POST' ]) !!}
                      {!! Form::hidden('Group_id', $group1) !!}
                      {{Form::submit ('Finalize', ['class'=> 'btn btn-primary'])}} 
                      {!! Form::close() !!}
                      @endif

                     <br>
                    <table class="table">

                    <h3 align="center"> Group: {{$group2}} </h3>
                      <thead align="center" class=" card-header card-header-primary">
                        <th>
                          Student ID
                        </th>
                        <th>
                          Fist name
                        </th>
                        <th>
                          Last name
                        </th>
                        <th>
                          Department
                        </th>
                      </thead>

                      <tbody>
                      @foreach($group2Members as $group2Member)
                       <tr align="center">
                       <td> {{$group2Member->id}} </td>
                       <td> {{$group2Member->first_name}} </td>
                       <td>{{$group2Member->last_name}} </td>
                       <td>{{$group2Member->name}} </td>
                       </tr>
                       @endforeach
                      </tbody>

                    </table>
                    @if($Check == 1)
                    <button class='btn btn-inform' type='button' disabled>
                     Already finalized !</button>
                    @elseif($Check == 0)

                     {!! Form::open(['action'=> 'ProposalsController@FinalApprove', 'method'=>'POST' ]) !!}
                      {!! Form::hidden('Group_id', $group2) !!}
                      {{Form::submit ('Finalize', ['class'=> 'btn btn-primary'])}} 
                      {!! Form::close() !!}
                    @endif

                    @elseif($GroupNumber == 1)
                    <table class="table">
                      <thead align="center" class=" card-header card-header-primary">
                        <th>
                          Student ID
                        </th>
                        <th>
                          Fist name
                        </th>
                        <th>
                          Last name
                        </th>
                        <th>
                          Department
                        </th>
                      </thead>

                      <tbody>
                      @foreach($group1Members as $group1Member)
                       <tr align="center">
                       <td> {{$group1Member->id}} </td>
                       <td> {{$group1Member->first_name}} </td>
                       <td>{{$group1Member->last_name}} </td>
                       <td>{{$group1Member->name}} </td>
                       </tr>
                       @endforeach
                      </tbody>

                    </table>

                     @if($Check == 1)
                    <button class='btn btn-inform' type='button' disabled>
                     Already finalized !</button>
                    @elseif($Check == 0)

                      {!! Form::open(['action'=> 'ProposalsController@FinalApprove', 'method'=>'POST' ]) !!}
                      {!! Form::hidden('Group_id', $group1) !!}
                      {!! Form::hidden('P_id', $P_id) !!}
                      {{Form::submit ('Finalize', ['class'=> 'btn btn-primary'])}} 
                      {!! Form::close() !!}
                      @endif


                    @endif
                    
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
@endsection