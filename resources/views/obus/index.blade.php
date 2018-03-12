@extends('admin.layouts.template')
@section('page_heading')
@section('content')
{!! Html::style('/packages/dropzone/dropzone.css') !!}

<class="container">
        <div class="form-group"><h1 style="font-size:38px;">กระบวนการ
                </h1></div>

   
    @if(Session::has('message'))
<div class="alert alert-success">{{ Session::get('message') }}</div>
@endif
<p>
</p><br>
<div class="bs-example" data-example-id="bordered-table">
    <div class="row">
        <div class="col-lg-10">
<div class="panel panel-default" >
    <div class="panel-heading">
           <div class="col-lg-3">ตารางองค์ประกอบอื่นๆ</div> <div class="col-lg-7"></div>
           {{ link_to_route('obus.create','เพิ่มข้อมูล',null,['class'=>'btn btn-success']) }}
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body" style="margin-right:20px;">
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
          <thead>
            <tr>
                <th>ชื่อ</th>
                <th>จัดการ</th>

            </tr>
              </thead>
              <tbody>
                @foreach($place1 as $place)
                <tr>
                     <td>{{ $place->name}}  </td>
                         <td>
                           {!! Form::open(array('route'=>['obus.destroy',$place->id],'method'=>'DELETE')) !!}
                        {{ link_to_route('obus.edit','แก้ไข',[$place->id],['class'=>'btn btn-primary','id'=>'a']) }}
                           {!! Form::button('ลบ',['class'=>'btn btn-danger del','type'=>'submit']) !!}
                           {!! Form::close() !!}
                         </td>
                 </tr>
                @endforeach
              </tbody>
        </table>
    </div></div>
    </div>
    <!-- /.panel-body -->
</div>
<!-- /.panel -->

</div>
    <script src="{{asset('/assets/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <script>
        $(document).ready(function() {

            document.getElementById("file").onchange = function () {
                document.getElementById("uploadFile").value = this.value;
            };
        });

    </script>
@stop
