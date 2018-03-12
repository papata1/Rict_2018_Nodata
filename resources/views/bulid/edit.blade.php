@extends('admin.layouts.template')
@section('page_heading','Update')
@section('content')

<div class="container">
       <div class="row">
           <div class="col-md-6 col-md-offset-1"><br>

               <div class="panel panel-default">

                   <div class="panel-heading">แผนผังอาคาร
                   </div>

                   <div class="panel-body">


                     {!! Form::model($place,array('route'=>['bulid.update',$place->id],'method'=>'PUT','novalidate' => 'novalidate','files' => true)) !!}


                                    <div class="form-group">
                                        {!! Form::label('name','ชื่อ') !!}
                                        {!! Form::text('name',null,['class'=>'form-control']) !!}
                                    </div>

                        <div class="form-group">
 {!! Form::label('pic','รูปแผนผังอาคาร png,jpg') !!}<br>
                           @if ($place->pic)
                               <p><img src="{{ URL::to('/') }}/images/bulid/{{ $place->pic }}"  width="500" height="500" /></p>
                               {!! Form::file('pic',null,['class'=>'form-control']) !!}<p></p>
                           @else

                               <br ><p>ไม่มีไฟล์ </p>
                               {!! Form::file('pic',null,['class'=>'form-control']) !!}
                           @endif

                       </div>

                                     <div class="form-group">
{!! Form::label('file','ไฟล์แผนผังอาคาร excel,word,pdf') !!}<br>
                           @if ($place->data)
                               
                               <p><a href="{{ action('Technology_bulidController@download' ,[$place->data]) }}">{{$place->data}}</a></p>
                               {!! Form::file('file',null,['class'=>'form-control']) !!}
                           @else

                               <br ><p>ไม่มีไฟล์ </p>
                               {!! Form::file('file',null,['class'=>'form-control']) !!}
                           @endif

                       </div>

                        

                                    <div class="form-group">
                                        {!! Form::button('บันทึก',['type'=>'submit','class'=>'btn btn-primary']) !!}
                                        {{ link_to_route('bulid.index','ย้อนกลับ',null,['class'=>'btn btn-danger']) }}
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
