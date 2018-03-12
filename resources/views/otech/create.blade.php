@extends('admin.layouts.template')
@section('page_heading','Crate')
@section('content')

<div class="container">
       <div class="row">
           <div class="col-md-6 col-md-offset-1"><br>

               <div class="panel panel-default">

                   <div class="panel-heading">องค์ประกอบอื่นๆ(Other Artifacts)
                   </div>

                   <div class="panel-body">

                     {!! Form::open(array('route'=>'otech.store','class' => 'form',
        'novalidate' => 'novalidate',
        'files' => true)) !!}

                                  <div class="form-group">
                                      {!! Form::label('name','ชื่อ') !!}
                                      {!! Form::text('name',null,['class'=>'form-control']) !!}
                                  </div>
                                  
                                     <div class="form-group">
                                        {!! Form::label('pic','รูปองค์ประกอบอื่นๆ(Other Artifacts) png,jpg') !!}
                                        {!! Form::file('pic',null,['class'=>'form-control']) !!}
                                    </div>

                                     <div class="form-group">
                                        {!! Form::label('data','ไฟล์องค์ประกอบอื่นๆ(Other Artifacts) excel,word,pdf') !!}
                                        {!! Form::file('data',null,['class'=>'form-control']) !!}
                                    </div>

                                    <div class="form-group">
                                        {!! Form::button('เพิ่ม',['type'=>'submit','class'=>'btn btn-primary']) !!}
                                        {{ link_to_route('otech.index','ย้อนกลับ',null,['class'=>'btn btn-danger']) }}
                                    </div>
                                {!! Form::close() !!}
                   </div>
               </div>
                                     @if($errors->any())
                                    <ul class="alert alert-danger">
                                    @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                    </ul>
                                    @endif
           </div>
       </div>
   </div>
@stop
