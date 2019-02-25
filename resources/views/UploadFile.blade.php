@extends('Layouts.Default')

@section('content')


<div class="row">

        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                <div class="card card-stats">
                  <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">attach_file</i>
                    </div>
                    <p class="card-category">  GPC Documents </p>
                    <h3 class="card-title"></h3>
                  </div>
                  <div class="card-footer ">
                    <div class="stats pre-scrollable">
                        
                     <table class="table">
                         <tbody>
                      @foreach($filesGPC as $fileGPC)
                      <tr>
                            
                        <td>{{$fileGPC->name}}</td>
                        <td>{{$fileGPC->user->first_name}}</td>
                        <td>{{$fileGPC->created_at}}</td>
                       
                        <td> {!! Form::open(['action'=> 'FilesController@download', 'method'=>'POST' ]) !!}
                                {!! Form::hidden('group_id', 0) !!}
                                {!! Form::hidden('name', $fileGPC->name) !!}
                            {{Form::submit ('Dwonload', ['class'=> 'btn btn-sm'])}}</td>
                        {!! Form::close() !!}

                        <td>

                        {!! Form::open(['action'=> 'FilesController@GPCdelete', 'method'=>'POST' ]) !!}
                        {!! Form::hidden('id', $fileGPC->id) !!}
                        {!! Form::hidden('name', $fileGPC->name) !!}
                        {!! Form::hidden('file_path', $fileGPC->file_path) !!}
                        {{Form::submit ('DELETE', ['class'=> 'btn btn-danger btn btn-sm'])}}</td>
                        {!! Form::close() !!}
                        </td>
                      </tr>
                      @endforeach                  
                    </tbody>
                    </table>
                    </div>
                  </div>
                </div>
              </div>

</div>

{!! Form::open(['action'=> 'FilesController@store', 'method'=>'POST', 'enctype'=>'multipart/form-data' ]) !!}
{{ csrf_field() }}
<label for="file"> File: </label>
<input type="file" name="file" id="file" > Upload File </input>

{{Form::submit ('save', ['class'=> 'btn btn-sm btn btn-success'])}}


{!! Form::close() !!}







@endsection