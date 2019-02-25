@extends('layouts.Default')

@section('content')



@if(Auth::user()->user_role == 5)
          <div class="content">
           <div class="container-fluid  ">
            <div class="row">
             <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Graduate Project Idea Proforma</h4>
                  <p class="card-category"> </p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead class=" text-primary">
                        <th>
                          ID
                        </th>
                        <th>
                          Title
                        </th>
                        <th>
                          Proposed by
                        </th>
                        <th>
                          
                        </th>
                      
                      </thead>
                      <tbody>
                      @foreach($proposals as $proposal)
                        <tr>
                        @if($proposal->status == 1)
                          <td>{{$proposal->id}}</td>
                           <td>{{$proposal->title}}</td>
                           <td>{{$proposal->supervisor_id}}</td>
                           <td>
                           @if($proposal->Times < 2 )
                           <a href="/proposals/{{ $proposal->id }}" class="text-primary">Details</a>
                           @else
                           
                           <a href="/proposals/{{ $proposal->id }}" class="inactiveLink">Details</a>
                           @endif
                           </td>
                        </tr> 
                        @endif
                         @endforeach
                        
                         
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

@endif

@if(Auth::user()->user_role == 2 )
          <div class="content">
           <div class="container-fluid  ">
            <div class="row">
             <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Graduation project proposals</h4>
                  <p class="card-category"> </p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead class=" text-primary">
                        <th>
                          ID
                        </th>
                        <th>
                          Title
                        </th>
                        <th>
                          Proposed by
                        </th>
                        <th>Syntactic similarity</th>
                        <th>
                          
                        </th>
                      
                      </thead>
                      <tbody>
                      @foreach($proposals as $proposal)
                        <tr>
                        
                          <td> <i class="material-icons" tooltip="Approved " data-toggle="tooltip" data-placement="top" title="Hooray!" >@if($proposal->status == 1) check @elseif($proposal->status == 0) error @endif </i> {{$proposal->id}}</td>
                           <td>{{$proposal->title}}</td>
                           <td>Dr. {{$proposal->supervisor->last_name}} ,{{$proposal->supervisor->first_name}}</td>
                           <td>{{$proposal->Similarity}}% similarity with <a href="/proposals/{{ $proposal->P_ID }}"> proposal {{$proposal->P_ID}}</a> </td>
                           <td><a href="/proposals/{{ $proposal->id }}">Details</a></td>
                        </tr> 
                        
                         @endforeach
                        
                         
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

@endif


  @if(Auth::user()->user_role == 3)

<div class="content">
           <div class="container-fluid">
            <div class="row">
             <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Your proposals</h4>
                  <p class="card-category"> </p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead class=" text-primary">
                        <th>
                          ID
                        </th>
                        <th>
                          Title
                        </th>
                        <th>
                          Selected by 
                        </th>
                        <th>
                        Edit
                        </th>
                        <th>
                          Status
                        </th>
                      
                      </thead>
                      <tbody>
                      @foreach($proposals as $proposal)
                        <tr>
                          @if(Auth::user()->id == $proposal->supervisor_id)

                          
                          <td>{{$proposal->id}}</td>
                        <td>{{$proposal->title}}</td>   
                        {{-- Problem here --}}
                           <td> {!! Form::open(['action'=> 'ProposalsController@ViewChosenProposal', 'method'=>'POST' ]) !!}
                              {!! Form::hidden('proposal_id', $proposal->id) !!}
                              {!! Form::hidden('proposal_title', $proposal->title) !!}
                             
                              {{Form::submit ($proposal->Times.' Group/Groups', ['class'=> 'btn btn-primary'])}} 
                              {!! Form::close() !!}  </td>

                            {{-- <a href="/ViewProposalChosen">{{$proposal->Times}} Group/Groups</a>  --}}


                           <td><a href="/proposals/{{ $proposal->id }}">Details</a></td>

                           <td class="btn btn-primary ">
                           @if($proposal->status == 1)
                            Approved
                          
                             @elseif($proposal->status == 0)
                             Pending 
                             @endif 
                           </td>
                           
                           
                        @endif 
                        </tr> 
                         @endforeach
                        
                         
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <a href="ProposeIdea" class="btn btn-primary pull-right">Add a proposal</a>
              <!-- <button type="submit" class="btn btn-primary pull-right" href="{{ url('ProposeIdea') }}" >Add a proposal</button> -->
            </div>

            <br><br><br><br><br><br><br><br><br><br><br><br><br><br>

            

            

<div class="col-md-12">
              <div class="card card-plain">
                <div class="card-header card-header-primary">
                  <h4 class="card-title mt-0">All proposalss</h4>
                  <p class="card-category"> Graduatation Project Idea Proforma</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead class="">
                        <th>
                          ID
                        </th>
                        <th>
                          Title
                        </th>
                        <th>
                          Proposed by
                        </th>
                        <th>
                          Status
                        </th>
                        
                      </thead>
                      @foreach($proposals as $proposal)
                        <tr>
                          

                          
                          <td>{{$proposal->id}}</td>
                           <td>{{$proposal->title}}</td>
                           <td>Dr. {{$proposal->supervisor->last_name}}, {{$proposal->supervisor->first_name}}</td>
                           <td class="btn btn-primary ">
                           @if($proposal->status == 1)
                            Approved
                          
                             @elseif($proposal->status == 0)
                             Pending 
                             @endif
                           </td>
                           
                        
                        </tr> 
                         @endforeach
                      <tbody>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            
          </div>
        </div>
      </div>
            

  @endif


            

      <br><br><br><br>
            @endsection