@extends('Layouts.Default')
@section('content')


<div class="content">
           <div class="container-fluid  ">
            <div class="row">
             <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Graduation Project Groups</h4>
                  <p class="card-category"> </p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead class=" text-primary">
                        <th>
                          Group ID
                        </th>
                        <th>
                          Group members
                        </th>
                        <th>
                          Project ID
                        </th>
                        <th>
                          
                        </th>
                      
                      </thead>
                      <tbody>
                      @foreach($Groups as $Group)
                        <tr>
                       
                          <td>{{$Group->id}}</td>
                           <td>{{$Group->NumberOfStudents}}</td>
                           <td>{{$Group->Project_ID}}</td>
                           <td>
                           
                                {!! Form::open(['action'=> 'FilesController@ShowGroupFiles', 'method'=>'POST' ]) !!}
                                {!! Form::hidden('group_id', $Group->id) !!}
                                {{Form::submit ('Review files', ['class'=> 'btn btn-sm'])}} 
                                {!! Form::close() !!}
                           
                           </td>
                        </tr> 
                      
                         @endforeach
                        
                         
                      </tbody>
                    </table>

                    
                    <a href="{{url('Examinar/Marks')}}" class="btn btn-sm btn btn-success">Upload Result</a>
                  </div>
                </div>
              </div>
            </div>


@endsection