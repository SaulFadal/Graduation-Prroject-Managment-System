@extends('Layouts.Default')

@section('content')

<div class="row">

        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                <div class="card card-stats">
                  <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">attach_file</i>
                    </div>
                    <p class="card-category">  Group No. {{$Group_id}} </p>
                    <h3 class="card-title"></h3>
                  </div>
                  <div class="card-footer ">
                    <div class="stats ">
                     <table class="table">
                         <tbody>
                      @foreach($GroupFiles as $GroupFile)
                      <tr>
                            
                        <td>{{$GroupFile->name}}</td>
                        <td>{{$GroupFile->user->first_name}}</td>
                      <td>{{$GroupFile->created_at}}</td>
                        <td></td>
                       
                        <td> {!! Form::open(['action'=> 'FilesController@Examinardownload', 'method'=>'POST' ]) !!}
                                {!! Form::hidden('name', $GroupFile->name) !!}
                                {!! Form::hidden('file_path', $GroupFile->file_path) !!}
                            {{Form::submit ('Dwonload', ['class'=> 'btn btn-sm'])}}</td>
                        {!! Form::close() !!}
                      </tr>
                      @endforeach                  
                    </tbody>
                    </table>
                    </div>
                    
                  </div>
                </div>
              </div>

</div>



@endsection


