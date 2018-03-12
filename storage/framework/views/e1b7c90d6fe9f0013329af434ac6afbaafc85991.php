<?php $__env->startSection('page_heading'); ?>
<?php $__env->startSection('content'); ?>
<class="container">
  			<div class="form-group"><h1 style="font-size:38px;">สมาชิก</h1></div>
    <?php if(Session::has('message')): ?>
<div class="alert alert-success"><?php echo e(Session::get('message')); ?></div>
<?php endif; ?>
<p>
</p>
<div class="bs-example" data-example-id="bordered-table">.
    <div class="row">
        <div class="col-lg-10">
<div class="panel panel-default" >
    <div class="panel-heading">
        <div class="col-lg-2">ตารางสมาชิก</div><div class="col-lg-9"></div><?php echo e(link_to_route('user.create','เพิ่ม ',null,['class'=>'btn btn-success'])); ?>

    </div>
    <!-- /.panel-heading -->
    <div class="panel-body" style="margin-right:20px;">
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
          <thead>
            <tr>
              <th>ลำดับ</th>
                <th>ชื่อ</th>
                <th>อีเมลล์</th>
                <th>ตำแหน่ง</th>
                <th>จัดการ</th>
            </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <tr>
                     <td><?php echo e($user->id); ?>  </td>
                     <td><?php echo e($user->name); ?>  </td>
                     <td><?php echo e($user->email); ?>  </td>
                    <td><?php echo e($user->role); ?>  </td>
                         <td>
                           <?php echo Form::open(array('route'=>['user.destroy',$user->id],'method'=>'DELETE')); ?>

                        <?php echo e(link_to_route('user.edit','แก้ไข',[$user->id],['class'=>'btn btn-primary'])); ?>

                           <?php echo Form::button('ลบ',['class'=>'btn btn-danger del','type'=>'submit']); ?>

                           <?php echo Form::close(); ?>

                         </td>
                 </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
              </tbody>
        </table>
    </div>   </div>
    </div>
    <!-- /.panel-body -->
</div>
<!-- /.panel -->

</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>