<?php $__env->startSection('page_heading'); ?>
<?php $__env->startSection('section'); ?>
<div class="container">
  			<div class="form-group"><h1 style="font-size:38px;">BUSSINESS</h1></div>
    <?php if(Session::has('message')): ?>
<div class="alert alert-success"><?php echo e(Session::get('message')); ?></div>
<?php endif; ?>
<div class="bs-example" data-example-id="bordered-table">
<div class="panel panel-default" >
    <div class="panel-heading">
        Application Tables
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body" style="margin-right:20px;">
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
          <thead>
            <tr>
              <th>id</th>
                <th>Name</th>
                <th>E-mail</th>
                <th>Action</th>
            </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <tr>
                     <td><?php echo e($user->id); ?>  </td>
                     <td><?php echo e($user->name); ?>  </td>
                     <td><?php echo e($user->email); ?>  </td>
                         <td>
                           <?php echo Form::open(array('route'=>['user.destroy',$user->id],'method'=>'DELETE')); ?>

                           <?php echo e(link_to_route('user.edit','Edit',[$user->id],['class'=>'btn btn-primary'])); ?>

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
<?php echo e(link_to_route('user.create','Add New ',null,['class'=>'btn btn-success'])); ?>

</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>