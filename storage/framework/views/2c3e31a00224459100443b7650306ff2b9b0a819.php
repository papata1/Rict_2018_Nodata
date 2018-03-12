<?php $__env->startSection('page_heading'); ?>
<?php $__env->startSection('content'); ?>
<?php echo Html::style('/packages/dropzone/dropzone.css'); ?>

<?php echo Html::script('/packages/dropzone/dropzone.js'); ?>

<?php echo Html::script('/assets/js/dropzone-config.js'); ?>

<div class="container">
  			<div class="form-group"><h1 style="font-size:38px;">หน่วยงานที่เกี่ยวข้อง
                </h1></div>

         <h3>Import</h3>
    <form action="involImport" method = "post" enctype="multipart/form-data" >
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" >
                <input type="file" id="file_upload" name="file_upload"class="dropzone">
                <input type="submit" value="Import" class="btn btn-success">
            </form>
            <h3>download template ที่ใช้ในการ upload</h3>
            <button class="btn btn-primary">Download</button><br><br>
    <?php if(Session::has('message')): ?>
<div class="alert alert-success"><?php echo e(Session::get('message')); ?></div>
<?php endif; ?>
<p><?php echo e(link_to_route('invol.create','Add New ',null,['class'=>'btn btn-success'])); ?>

</p>
<div class="bs-example" data-example-id="bordered-table">
    <div class="row">
        <div class="col-lg-10">
<div class="panel panel-default" >
    <div class="panel-heading">
        Involved Tables
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body" style="margin-right:20px;">
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
          <thead>
            <tr>
              <th>ลำดับ</th>
                <th>ชื่อ</th>
                <th>หมายเหตุ</th>
            </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $invol1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invol): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <tr>
                     <td><?php echo e($invol->id); ?>  </td>
                     <td><?php echo e($invol->name); ?>  </td>
                     <td><?php echo e($invol->remark); ?>  </td>
                         <td>
                           <?php echo Form::open(array('route'=>['invol.destroy',$invol->id],'method'=>'DELETE')); ?>

                        <?php echo e(link_to_route('invol.edit','Edit',[$invol->id],['class'=>'btn btn-primary','id'=>'a'])); ?>

                           <?php echo Form::button('Delete',['class'=>'btn btn-danger del','type'=>'submit']); ?>

                           <?php echo Form::close(); ?>

                         </td>
                 </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
              </tbody>
        </table>
    </div> </div>
    </div>
    <!-- /.panel-body -->
</div>
<!-- /.panel -->

</div>
   
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>