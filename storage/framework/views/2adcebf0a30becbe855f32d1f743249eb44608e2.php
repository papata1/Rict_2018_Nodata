<?php $__env->startSection('page_heading','Update'); ?>
<?php $__env->startSection('content'); ?>

<div class="container">
       <div class="row">
           <div class="col-md-10 col-md-offset-1">.

               <div class="panel panel-default">

                   <div class="panel-heading">Business</div>

                   <div class="panel-body">


                     <?php echo Form::model($bus,array('route'=>['bus.update',$bus->id],'method'=>'PUT')); ?>



                                    <div class="form-group">
                                        <?php echo Form::label('name','name'); ?>

                                        <?php echo Form::text('name',null,['class'=>'form-control']); ?>

                                    </div>
                                    <div class="form-group">
                                        <?php echo Form::label('workflow_path','workflow_path'); ?>

                                        <?php echo Form::text('workflow_path',null,['class'=>'form-control']); ?>

                                    </div>
                                    <div class="form-group">
                                        <?php echo Form::label('remark','remark'); ?>

                                        <?php echo Form::text('remark',null,['class'=>'form-control']); ?>

                                    </div>
                                    <div class="form-group">
                                        <?php echo Form::label('department_id','department_id'); ?>

                                        <?php echo Form::text('department_id',null,['class'=>'form-control']); ?>

                                    </div>

                                    <div class="form-group">
                                        <?php echo Form::button('Update',['type'=>'submit','class'=>'btn btn-primary']); ?>

                                    </div>
                                <?php echo Form::close(); ?>




                   </div>
               </div>
               <?php if($errors->any()): ?>
              <ul class="alert alert-danger">
              <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
              <li><?php echo e($error); ?></li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
              </ul>
              <?php endif; ?>
           </div>
       </div>
   </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>