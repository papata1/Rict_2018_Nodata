<?php $__env->startSection('page_heading','Crate'); ?>
<?php $__env->startSection('content'); ?>

<div class="container">
       <div class="row">
           <div class="col-md-10 col-md-offset-1">.

               <div class="panel panel-default">

                   <div class="panel-heading">Application</div>

                   <div class="panel-body">

                     <?php echo Form::open(array('route'=>'app.store','class' => 'form',
        'novalidate' => 'novalidate',
        'files' => true)); ?>



                      <div class="form-group">
                        <?php echo Form::label('name','name'); ?>

                        <?php echo Form::text('name',null,['class'=>'form-control']); ?>

                      </div>
                      <div class="form-group">
                        <?php echo Form::label('develop_language','develop_language'); ?>

                        <?php echo Form::text('develop_language',null,['class'=>'form-control']); ?>

                      </div>
                      <div class="form-group">
                        <?php echo Form::label('app_database','app_database'); ?>

                        <?php echo Form::text('app_database',null,['class'=>'form-control']); ?>

                      </div>
                      <div class="form-group">
                        <?php echo Form::label('develop_company','develop_company'); ?>

                        <?php echo Form::text('develop_company',null,['class'=>'form-control']); ?>

                      </div>
                      <div class="form-group">
                        <?php echo Form::label('getting_start_years','getting_start_years'); ?>

                        <?php echo Form::text('getting_start_years',null,['class'=>'form-control']); ?>

                      </div>
                      <div class="form-group">
                        <?php echo Form::label('app_relation','app_relation'); ?>

                        <?php echo Form::text('app_relation',null,['class'=>'form-control']); ?>

                      </div>
                      <div class="form-group">
                        <?php echo Form::label('remark','remark'); ?>

                        <?php echo Form::text('remark',null,['class'=>'form-control']); ?>

                      </div>
                      <div class="form-group">
                        <?php echo Form::label('ma_cost','ma_cost'); ?>

                        <?php echo Form::text('ma_cost',null,['class'=>'form-control']); ?>

                      </div>
                      <div class="form-group">
                        <?php echo Form::label('department_id','department_id'); ?>

                        <?php echo Form::text('department_id',null,['class'=>'form-control']); ?>

                      </div>
                      <div class="form-group">
                        <?php echo Form::button('Create',['type'=>'submit','class'=>'btn btn-primary']); ?>

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