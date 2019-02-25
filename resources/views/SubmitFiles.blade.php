@extends('layouts.Default')
@section('content')


	<div class="row">
    
    <div class="col-xl-6 col-lg-8 col-md-8 col-sm-8">
                <div class="card card-stats">
                  <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">attach_file</i>
                    </div>
                    <p class="card-category">  Midterm report </p>
                    <h3 class="card-title"></h3>
                  </div>
                  <div class="card-footer ">
                    <div class="stats ">
                     <table class="table">
                         <tbody>
                      @foreach($SubmittedMidtermReport  as $SubmittedMidtermReport)
                      <tr>
                            
                        <td>{{$SubmittedMidtermReport->name}}</td>
                        <td>{{$SubmittedMidtermReport->user->first_name}}</td>
                       
                        <td> {!! Form::open(['action'=> 'FilesController@download', 'method'=>'POST' ]) !!}
                                {!! Form::hidden('group_id', 0) !!}
                                {!! Form::hidden('name', $SubmittedMidtermReport->name) !!}
                            {{Form::submit ('Dwonload', ['class'=> 'btn btn-sm'])}}</td>
                        {!! Form::close() !!}
                      </tr>
                      @endforeach  
                      <tr>
                      </tr>               
                    </tbody>
                  </table>
                </div>
                {{-- HERE --}}
                @if(count($SubmittedMidtermReport)<1 )
                {!! Form::open(['class'=> 'form-control-file','action'=> 'FilesController@SubmitMidtermReport', 'method'=>'POST', 'enctype'=>'multipart/form-data' ]) !!}
                {{ csrf_field() }}
                <br>
                
                    <input type="file" name="file" id="file" class="custom-file" ></input>

                    {{Form::submit ('UPLOAD', ['class'=> 'btn btn-sm'])}}


                    {!! Form::close() !!}
                    @endif
                  </div>
                  
                </div>
                
              </div>


              <div class="col-xl-6 col-lg-8 col-md-8 col-sm-8">
                  <div class="card card-stats">
                    <div class="card-header card-header-warning card-header-icon">
                      <div class="card-icon">
                        <i class="material-icons">attach_file</i>
                      </div>
                      <p class="card-category">  Final report </p>
                      <h3 class="card-title"></h3>
                    </div>
                    <div class="card-footer ">
                      <div class="stats ">
                       <table class="table">
                           <tbody>
                        @foreach($SubmittedFinalReport  as $SubmittedFinalReport)
                        <tr>
                              
                          <td>{{$SubmittedFinalReport->name}}</td>
                          <td>{{$SubmittedFinalReport->user->first_name}}</td>
                         
                          <td> {!! Form::open(['action'=> 'FilesController@download', 'method'=>'POST' ]) !!}
                                  {!! Form::hidden('group_id', 0) !!}
                                  {!! Form::hidden('name', $SubmittedFinalReport->name) !!}
                              {{Form::submit ('Dwonload', ['class'=> 'btn btn-sm'])}}</td>
                          {!! Form::close() !!}
                        </tr>
                        @endforeach  
                        <tr>
                        </tr>               
                      </tbody>
                    </table>
                  </div>
                  {{-- HERE --}}
                  @if(count($SubmittedFinalReport)<1 )
                  {!! Form::open(['class'=> 'form-control-file','action'=> 'FilesController@SubmitFinalReport', 'method'=>'POST', 'enctype'=>'multipart/form-data' ]) !!}
                  {{ csrf_field() }}
                  <br>
                  
                      <input type="file" name="file" id="file" class="custom-file" ></input>
  
                      {{Form::submit ('UPLOAD', ['class'=> 'btn btn-sm'])}}
  
  
                      {!! Form::close() !!}
                      @endif
                    </div>
                    
                  </div>
                  
                </div>
                
</div>

{{-- SimCheck with Poster --}}
<div class="row">
    
    <div class="col-xl-6 col-lg-8 col-md-8 col-sm-8">
                <div class="card card-stats">
                  <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">attach_file</i>
                    </div>
                    <p class="card-category">  Similarity Check report </p>
                    <h3 class="card-title"></h3>
                  </div>
                  <div class="card-footer ">
                    <div class="stats ">
                     <table class="table">
                         <tbody>
                      @foreach($SubmittedSimCheck  as $SubmittedSimCheck)
                      <tr>
                            
                        <td>{{$SubmittedSimCheck->name}}</td>
                        <td>{{$SubmittedSimCheck->user->first_name}}</td>
                       
                        <td> {!! Form::open(['action'=> 'FilesController@download', 'method'=>'POST' ]) !!}
                                {!! Form::hidden('group_id', 0) !!}
                                {!! Form::hidden('name', $SubmittedSimCheck->name) !!}
                            {{Form::submit ('Dwonload', ['class'=> 'btn btn-sm'])}}</td>
                        {!! Form::close() !!}
                      </tr>
                      @endforeach  
                      <tr>
                      </tr>               
                    </tbody>
                  </table>
                </div>
                {{-- HERE --}}
                @if(count($SubmittedSimCheck)<1 )
                {!! Form::open(['class'=> 'form-control-file','action'=> 'FilesController@SubmitSimCheck', 'method'=>'POST', 'enctype'=>'multipart/form-data' ]) !!}
                {{ csrf_field() }}
                <br>
                
                    <input type="file" name="file" id="file" class="custom-file" ></input>

                    {{Form::submit ('UPLOAD', ['class'=> 'btn btn-sm'])}}


                    {!! Form::close() !!}
                    @endif
                  </div>
                  
                </div>
                
              </div>

              {{-- Poster Card div --}}
              <div class="col-xl-6 col-lg-8 col-md-8 col-sm-8">
                  <div class="card card-stats">
                    <div class="card-header card-header-warning card-header-icon">
                      <div class="card-icon">
                        <i class="material-icons">attach_file</i>
                      </div>
                      <p class="card-category">  Poster report </p>
                      <h3 class="card-title"></h3>
                    </div>
                    <div class="card-footer ">
                      <div class="stats ">
                       <table class="table">
                           <tbody>
                        @foreach($SubmittedPoster  as $SubmittedPoster)
                        <tr>
                              
                          <td>{{$SubmittedPoster->name}}</td>
                          <td>{{$SubmittedPoster->user->first_name}}</td>
                         
                          <td> {!! Form::open(['action'=> 'FilesController@download', 'method'=>'POST' ]) !!}
                                  {!! Form::hidden('group_id', 0) !!}
                                  {!! Form::hidden('name', $SubmittedPoster->name) !!}
                              {{Form::submit ('Dwonload', ['class'=> 'btn btn-sm'])}}</td>
                          {!! Form::close() !!}
                        </tr>
                        @endforeach  
                        <tr>
                        </tr>               
                      </tbody>
                    </table>
                  </div>
                  {{-- HERE --}}
                  @if(count($SubmittedPoster)<1 )
                  {!! Form::open(['class'=> 'form-control-file','action'=> 'FilesController@SubmitPoster', 'method'=>'POST', 'enctype'=>'multipart/form-data' ]) !!}
                  {{ csrf_field() }}
                  <br>
                  
                      <input type="file" name="file" id="file" class="custom-file" ></input>
  
                      {{Form::submit ('UPLOAD', ['class'=> 'btn btn-sm'])}}
  
  
                      {!! Form::close() !!}
                      @endif
                    </div>
                    
                  </div>
                  
                </div>
                
</div>





@endsection
