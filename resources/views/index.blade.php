@extends('layouts.Default')

@section('content')


@if(Auth::user()->user_role == 2)
<div class="row">

    <div class="col-xl-4 col-lg-8 col-md-8 col-sm-8">
        <div class="card card-stats">
          <div class="card-header card-header-warning card-header-icon">
            <div class="card-icon">
              <i class="material-icons">calendar_today</i>
            </div>
          <a href="{{url('event')}}"> <p class="card-category">My calender</p> </a>
            <h3 class="card-title"></h3>
          </div>
          <div class="card-footer">
            <div class="stats">
             
              <a href=""class="unread-messages"> </a>                    
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-lg-8 col-md-8 col-sm-8">
        <div class="card card-stats">
          <div class="card-header card-header-success card-header-icon">
            <div class="card-icon">
              <i class="material-icons">chat</i>
            </div>
            <a href="{{url('chat')}}"> <p class="card-category">Messages</p></a>
            <h3 class="card-title"></h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="material-icons">textsms</i>
              <a href=""class="unread-messages"> </a>                    
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-lg-8 col-md-8 col-sm-8">
        <div class="card card-stats">
          <div class="card-header card-header-danger card-header-icon">
            <div class="card-icon">
              <i class="material-icons">file_copy</i>
            </div>
          <a href="{{url('UploadFile')}}"> <p class="card-category">GPC files</p></a>
            <h3 class="card-title"></h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="material-icons"></i> 
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endif
@if (Auth::user()->user_role == 5 || Auth::user()->user_role == 3 )
        <div class="row">
        <div class="col-xl-4 col-lg-8 col-md-8 col-sm-8">
                <div class="card card-stats">
                  <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">calendar_today</i>
                    </div>
                  <a href="{{url('event')}}"> <p class="card-category">My calender</p> </a>
                    <h3 class="card-title"></h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                     
                      <a href=""class="unread-messages"> </a>                    
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-lg-8 col-md-8 col-sm-8">
                <div class="card card-stats">
                  <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">chat</i>
                    </div>
                    <a href="{{url('chat')}}"> <p class="card-category">Messages</p></a>
                    <h3 class="card-title"></h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons">textsms</i>
                      <a href=""class="unread-messages"> </a>                    
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-lg-8 col-md-8 col-sm-8">
                <div class="card card-stats">
                  <div class="card-header card-header-danger card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">file_copy</i>
                    </div>
                  <a href="{{url('files')}}"> <p class="card-category">My files</p></a>
                    <h3 class="card-title"></h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons"></i> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-12">
                <div class="card">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title">My project</h4>
                  <p class="card-category">Group No.{{$CurrentUserGroup}}</p>
                    <p class="card-category">Supervisor & Members</p>
                  </div>
                  <div class="card-body table-responsive">
                    <table class="table table-hover">
                      <thead class="text-warning">
                        <th>ID</th>
                        <th>Name</th>
                        
                        
                      </thead>
                      <tbody>
                          @if(count($GroupSupervisor)>=1)
                          @foreach($GroupSupervisor as $GroupSupervisor)
                            <tr>

                              <td>{{$GroupSupervisor->id}}</td>
                              <td>Dr. {{$GroupSupervisor->first_name}} {{$GroupSupervisor->last_name}}</td>
                               
                            </tr>
                          @endforeach
                          @endif
                          
                          @if(count($GroupMembers)>1)
                          @foreach($GroupMembers as $GroupMembers)
                        <tr>

                        <td>{{$GroupMembers->id}}</td>
                        <td>{{$GroupMembers->first_name}} {{$GroupMembers->last_name}}</td>
                         <td>@if($GroupMembers->id == $GroupLeader) LEADER @endif</td>
                        </tr>
                        @endforeach
                        @endif
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-12">
                <div class="card">
                  <div class="card-header card-header-tabs card-header-warning">
                    <div class="nav-tabs-navigation">
                      <div class="nav-tabs-wrapper">
                        <span class="nav-tabs-title"><strong>Tasks: </strong></span>
                        <ul class="nav nav-tabs" data-tabs="tabs">
                          <li class="nav-item">
                            <a class="nav-link active" href="#profile" data-toggle="tab">
                              <i class="material-icons">group</i> Group
                              <div class="ripple-container"></div>
                            </a>
                          </li>
                         
                          
                             <li class="nav-item">
                            <a class="nav-link" href="#settings" data-toggle="tab">
                              <i class="material-icons">add</i>Add a Task
                              <div class="ripple-container"></div>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="tab-content">
                      <div class="tab-pane active" id="profile">
                          @if(count($GroupMembers)>=1)
                        <!-- Tasks of the group -->
                       <table class="table">
                         <tbody>
                        @foreach($Tasks as $task)

                        @if($task->Done == 0)
                       
                         
                        <tr>
                            <td>
                              <div class="form-check">
                                <label class="form-check-label">
                                    
                                  <input onclick="/Task_status" class="form-check-input" type="checkbox" value="" >
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </td>
                          <td>{{ $task->Describtion}}: {{$task->To}} </td>
                           <td>

                              {!! Form::open(['action'=> 'TasksController@Done', 'method'=>'POST' ]) !!}
                              {!! Form::hidden('Task_id', $task->id) !!}
                              {{Form::submit ('Done', ['class'=> 'btn btn-success btn btn-sm'])}}</td>
                              {!! Form::close() !!}
                           </td>
                          </tr>
                         
                        @elseif($task->Done == 1)

                        <tr>
                            <td>
                              <div class="form-check">
                                <label class="form-check-label">
                                    
                                  <input onclick="/Task_status" class="form-check-input" type="checkbox" value="" checked >
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </td>
                          <td>{{ $task->Describtion}}: {{$task->To}} </td>
                           <td>

                              {!! Form::open(['action'=> 'TasksController@unDone', 'method'=>'POST' ]) !!}
                              {!! Form::hidden('Task_id', $task->id) !!}
                              {{Form::submit ('Not done', ['class'=> 'btn btn-danger btn btn-sm'])}}</td>
                              {!! Form::close() !!}
                           </td>
                          </tr>

                        @endif
                        
                        @endforeach
                        </tbody>
                      </table>

                          @endif
                      </div>
                     
                      <div class="tab-pane" id="settings">
                        <!--Change-->
                          @if(count($GroupMembers)>=1)
                       <!-- Form to add new task -->


                       {!! Form::open(['action'=> 'TasksController@add', 'method'=>'POST' ]) !!}
                        
                       <div class="form-group row">
                       {{Form::label('Describtion')}}
                           <div class="col-md-6">
                           {{Form::text ('Describtion','',['placeholder'=> 'Enter task describtion', 'class'=>'form-control ' ])}}
                           </div>
                       </div>
                       <br><br><br>

                       <div class="form-group row">
                       {{Form::label('Members')}}
                           <div class="col-md-6">  
                           
                           {{Form::select('Member', $MebersInSelectDropDown)}}
                           {!! Form::hidden('group_id', $CurrentUserGroup) !!}
                           </div>
                       </div>

                       <div class="form-group pull right">
                       {{Form::submit ('save', ['class'=> 'btn btn-sm btn btn-primary'])}}
                       </div>
                       {!! Form::close() !!}
                         

                        @endif
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@elseif(Auth::user()->user_role == 3)

@endif
@endsection