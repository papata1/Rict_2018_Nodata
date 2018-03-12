<?php $__env->startSection('page_heading'); ?>
<?php $__env->startSection('content'); ?>
<?php echo Html::style('/packages/dropzone/dropzone.css'); ?>


<class="container">
        <div class="form-group"><h1 style="font-size:38px;">กระบวนการ
                </h1></div>

   
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
           <div class="col-lg-3">ตารางองค์ประกอบอื่นๆ</div> <div class="col-lg-7"></div>
           <?php echo e(link_to_route('obus.create','เพิ่มข้อมูล',null,['class'=>'btn btn-success'])); ?>

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
                           <?php echo Form::open(array('route'=>['obus.destroy',$place->id],'method'=>'DELETE')); ?>

                        <?php echo e(link_to_route('obus.edit','แก้ไข',[$place->id],['class'=>'btn btn-primary','id'=>'a'])); ?>

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