@extends('Layouts.Default')
@section('content')

<div class="row">

    @if(count($ExaminarFiles) >0)
        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                <div class="card card-stats">
                  <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">attach_file</i>
                    </div>
                    <p class="card-category"> Results </p>
                    <h3 class="card-title"></h3>
                  </div>
                  <div class="card-footer ">
                    <div class="stats ">
                     <table class="table">
                         <tbody>
                      @foreach($ExaminarFiles as $ExaminarFile)
                      <tr>
                            
                        <td>{{$ExaminarFile->name}}</td>
                        <td>{{$ExaminarFile->user->first_name}}</td>
                      <td>{{$ExaminarFile->created_at}}</td>
                        <td></td>
                       
                        <td> {!! Form::open(['action'=> 'FilesController@Examinardownload', 'method'=>'POST' ]) !!}
                                {!! Form::hidden('name', $ExaminarFile->name) !!}
                                {!! Form::hidden('file_path', $ExaminarFile->file_path) !!}
                            {{Form::submit ('Dwonload', ['class'=> 'btn btn-sm'])}}</td>
                        {!! Form::close() !!}

                        <td>
                                {!! Form::open(['action'=> 'FilesController@Examinardelete', 'method'=>'POST' ]) !!}
                                {!! Form::hidden('name', $ExaminarFile->name) !!}
                                {!! Form::hidden('id', $ExaminarFile->id) !!}
                                {!! Form::hidden('file_path', $ExaminarFile->file_path) !!}
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

@elseif(count($ExaminarFiles) ==0)

<div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
        <div class="card card-stats">
          <div class="card-header card-header-warning card-header-icon">
            <div class="card-icon">
              <i class="material-icons">attach_file</i>
            </div>
            <p class="card-category">  </p>
            <h3 class="card-title"></h3>
          </div>
          <div class="card-footer ">
            <div class="stats ">
             <table class="table">
                 <tbody>
             <td>
                    {!! Form::open(['class'=> 'form-control-file','action'=> 'FilesController@StoreExaminarUpload', 'method'=>'POST', 'enctype'=>'multipart/form-data' ]) !!}
                    {{ csrf_field() }}
                    <br>
                    
                        <input type="file" name="file" id="file" class="custom-file" ></input>
    
                        {{Form::submit ('UPLOAD', ['class'=> 'btn btn-success btn btn-sm'])}}
    
    
                        {!! Form::close() !!}
                 </td>                  
            </tbody>
            </table>
            </div>
            
          </div>
        </div>
      </div>

</div>

@endif


@endsection