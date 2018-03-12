@extends('admin.layouts.template')
@section('page_heading','Update')
@section('content')

<div class="container">
       <div class="row">
           <div class="col-md-6 col-md-offset-1"><br>

               <div class="panel panel-default">

                   <div class="panel-heading">องค์ประกอบอื่นๆ(Other Artifacts)
                   </div>

                   <div class="panel-body">


                     {!! Form::model($place,array('route'=>['odata.update',$place->id],'method'=>'PUT','novalidate' => 'novalidate','files' => true)) !!}


                                    <div class="form-group">
                                        {!! Form::label('name','ชื่อ') !!}
                                        {!! Form::text('name',null,['class'=>'form-control']) !!}
                                    </div>

                                     <div class="form-group">

                           @if ($place->pic)
                               {!! Form::label('pic','รูปองค์ประกอบอื่นๆ(Other Artifacts) png,jpg') !!}<br>
                               <p><img src="{{ URL::to('/') }}/images/odata/{{ $place->pic }}"  width="500" height="500" /></p>
                               {!! Form::file('pic',null,['class'=>'form-control']) !!}<p></p>
                           @else

                               {!! Form::label('pic','รูปองค์ประกอบอื่นๆ(Other Artifacts) png,jpg') !!}<br ><p>ไม่มีไฟล์ </p>
                               {!! Form::file('pic',null,['class'=>'form-control']) !!}
                           @endif

                       </div>

                                     <div class="form-group">

                           @if ($place->data)
                               {!! Form::label('file','ไฟล์องค์ประกอบอื่นๆ(Other Artifacts) excel,word,pdf') !!}<br>
                               <p><a href="{{ action('OdataController@download' ,[$place->data]) }}">{{$place->data}}</a></p>
                               {!! Form::file('file',null,['class'=>'form-control']) !!}
                           @else

                               {!! Form::label('file','ไฟล์องค์ประกอบอื่นๆ(Other Artifacts) excel,word,pdf') !!}<br ><p>ไม่มีไฟล์ </p>
                               {!! Form::file('file',null,['class'=>'form-control']) !!}
                           @endif

                       </div>


                                    <div class="form-group">
                                        {!! Form::button('บันทึก',['type'=>'submit','class'=>'btn btn-primary']) !!}
                                        {{ link_to_route('odata.index','ย้อนกลับ',null,['class'=>'btn btn-danger']) }}
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
