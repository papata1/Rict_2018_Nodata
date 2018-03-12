<?php $__env->startSection('page_heading'); ?>
<?php $__env->startSection('content'); ?>
<?php echo Html::style('/packages/dropzone/dropzone.css'); ?>

<div class="row">
    <div class="col-lg-10">
<div class="form-group"><h1 style="font-size:38px;">ข้อมูลหลัก</h1></div>
<div class="panel panel-default" >
    <div class="panel-heading">
        เมนู
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body" style="margin-right:20px;">
        <div class="form-group"><h4 >โปรดเลือกหน้าที่ต้องการ</h4></div>
        <select id="master" name="master" class="form-control info">
            <option value="b" href="<?php echo e(url ('de')); ?>">หน่วยงานที่เกี่ยวข้อง</option>
            <option value="a" href="<?php echo e(url ('brand')); ?>">ยี่ห้อ</option>
            <option value="d" href="<?php echo e(url ('coll')); ?>">ประเภทการเก็บข้อมูล</option>
            <option value="r" href="<?php echo e(url ('lang')); ?>">ภาษาที่ใช้พัฒนา</option>
            <option value="q" href="<?php echo e(url ('place')); ?>" selected=\"selected\">สถานที่ตั้ง</option>
            <option value="g" href="<?php echo e(url ('ud')); ?>">ฐานข้อมูลที่ใช้</option>
            <option value="g" href="<?php echo e(url ('state')); ?>">สถานะ</option>
                <option value="" href="<?php echo e(url ('InApp')); ?>" >ตัวย่อระบบสารสนเทศและข้อมูล</option>
                 <option value="" href="<?php echo e(url ('lv1')); ?>">กระบวนการระดับ 1</option>
                <option value="" href="<?php echo e(url ('lv2')); ?>" >กระบวนการระดับ 2</option>
                <option value="" href="<?php echo e(url ('lv3')); ?>">กระบวนการระดับ 3</option>           
        </select>
    </div></div>
    </div>
    <!-- /.panel-body -->
</div>
<class="container">
  			<div class="form-group"><h1 style="font-size:38px;">สถานที่ตั้ง
                </h1></div>

    <div class="row">
        <div class="col-lg-5">
            <div class="panel panel-default" >
                <div class="panel-heading">
                    <button id="import" class="btn btn-default">นำเข้าข้อมูล</button>
                </div>
                <div class="panel-body1" style="margin-right:20px;">
    <form action="placeImport" method = "post" enctype="multipart/form-data" >
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" >
        <p class="file">
            <input type="file" name="file" id="file" />
            <label for="file">Upload your excel</label>
        </p>
        <!--<input type="input" id="uploadFile" disabled="disabled" class="a"/>-->

        <div class="file">
            <input type="submit" value="Import" id="ckImport">
            <label for="submit">Submit</label>
        </div> </form>     </div>       </div></div>

     <div class="col-lg-5">
        <div class="panel panel-default" >
            <div class="panel-heading">
                <button id="download" class="btn btn-default ">Download Template</button>
            </div>
            <div class="panel-body2" style="margin-right:20px;">
    <form>
               
        <div class="file">
        
            <a href="<?php echo e(url('download')); ?>" class="btn btn-primary">Download</a>
        </div>
    </form>
        </div> </div>
    </div>
    
    </div>
    <?php if(Session::has('message')): ?>
<div class="alert alert-success"><?php echo e(Session::get('message')); ?></div>
<?php endif; ?>
<p>
</p><br>
<div class="bs-example" data-example-id="bordered-table">
    <div class="row">
        <div class="col-lg-10">
<div class="panel panel-default" >
    <div class="panel-heading">
          <div class="col-lg-2">ตารางสถานที่ตั้ง</div> <div class="col-lg-8"></div><?php echo e(link_to_route('place.create','เพิ่มสถานที่ตั้ง',null,['class'=>'btn btn-success'])); ?>

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
                <?php $__currentLoopData = $place1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $place): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <tr>
                     <td><?php echo e($place->name); ?>  </td>
                         <td>
                           <?php echo Form::open(array('route'=>['place.destroy',$place->id],'method'=>'DELETE')); ?>

                        <?php echo e(link_to_route('place.edit','แก้ไข',[$place->id],['class'=>'btn btn-primary','id'=>'a'])); ?>

                           <?php echo Form::button('ลบ',['class'=>'btn btn-danger del','type'=>'submit']); ?>

                           <?php echo Form::close(); ?>

                         </td>
                 </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
              </tbody>
        </table>
    </div></div>
    </div>
    <!-- /.panel-body -->
</div>
<!-- /.panel -->

</div>
    <script src="<?php echo e(asset('/assets/bower_components/jquery/dist/jquery.min.js')); ?>"></script>
    <script>
        $(document).ready(function() {

            document.getElementById("file").onchange = function () {
                document.getElementById("uploadFile").value = this.value;
            };
        });

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>