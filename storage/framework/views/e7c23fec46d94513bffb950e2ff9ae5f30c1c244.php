<?php $__env->startSection('page_heading'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
  			<div class="form-group"><h1 style="font-size:38px;">Department</h1></div>
         <h3>Import</h3>
            <form action="deImport" method = "post" enctype="multipart/form-data">

                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" >
                <input type="file" name="appImport" class="form-group col-xs-3">
                <input type="submit" value="Import" class="btn btn-success">
            </form>
            <h3>download template ที่ใช้ในการ upload</h3>
            <button class="btn btn-primary">Download</button><br><br>
    <?php if(Session::has('message')): ?>
<div class="alert alert-success"><?php echo e(Session::get('message')); ?></div>
<?php endif; ?>
<div class="bs-example" data-example-id="bordered-table">
<div class="panel panel-default" >
    <div class="panel-heading">
        Department Tables
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body" style="margin-right:20px;">
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
          <thead>
            <tr>
              <th>id</th>
                <th>Name</th>
                <th>Remark</th>
            </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $des; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $de): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <tr>
                     <td><?php echo e($de->id); ?>  </td>
                     <td><?php echo e($de->name); ?>  </td>
                     <td><?php echo e($de->remark); ?>  </td>
                         <td>
                           <?php echo Form::open(array('route'=>['de.destroy',$de->id],'method'=>'DELETE')); ?>

                        <?php echo e(link_to_route('de.edit','Edit',[$de->id],['class'=>'btn btn-primary'])); ?>

                           <?php echo Form::button('Delete',['class'=>'btn btn-danger','type'=>'submit']); ?>

                           <?php echo Form::close(); ?>

                         </td>
                 </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
              </tbody>
        </table>

    </div>
    <!-- /.panel-body -->
</div>
<!-- /.panel -->
<?php echo e(link_to_route('de.create','Add New ',null,['class'=>'btn btn-success'])); ?>


</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>