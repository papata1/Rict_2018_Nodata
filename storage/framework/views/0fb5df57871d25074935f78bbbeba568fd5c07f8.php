<?php $__env->startSection('page_heading','Crate'); ?>
<?php $__env->startSection('content'); ?>

<div class="container">
       <div class="row">
           <div class="col-md-10 col-md-offset-1">.

               <div class="panel panel-default">

                   <div class="panel-heading">Application</div>

                   <div class="panel-body">

                     <?php echo Form::open(array('route'=>'tech.store','class' => 'form',
        'novalidate' => 'novalidate',
        'files' => true)); ?>



                      <div class="form-group">
                        <?php echo Form::label('name','name'); ?>

                        <?php echo Form::text('name',null,['class'=>'form-control']); ?>

                      </div>
                      <div class="form-group">
                        <?php echo Form::label('brand','brand'); ?>

                        <?php echo Form::text('brand',null,['class'=>'form-control']); ?>

                      </div>
                      <div class="form-group">
                        <?php echo Form::label('model','model'); ?>

                        <?php echo Form::text('model',null,['class'=>'form-control']); ?>

                      </div>
                      <div class="form-group">
                        <?php echo Form::label('tech_spec','tech_spec'); ?>

                        <?php echo Form::text('tech_spec',null,['class'=>'form-control']); ?>

                      </div>
                      <div class="form-group">
                        <?php echo Form::label('amount','amount'); ?>

                        <?php echo Form::text('amount',null,['class'=>'form-control']); ?>

                      </div>
                      <div class="form-group">
                        <?php echo Form::label('operating_system','operating_system'); ?>

                        <?php echo Form::text('operating_system',null,['class'=>'form-control']); ?>

                      </div>
                      <div class="form-group">
                        <?php echo Form::label('cpu_use','cpu_use'); ?>

                        <?php echo Form::text('cpu_use',null,['class'=>'form-control']); ?>

                      </div>
                      <div class="form-group">
                        <?php echo Form::label('memory_total',' memory_total'); ?>

                        <?php echo Form::text('memory_total',null,['class'=>'form-control']); ?>

                      </div>
                      <div class="form-group">
                        <?php echo Form::label('memory_used','memory_used'); ?>

                        <?php echo Form::text('memory_used',null,['class'=>'form-control']); ?>

                      </div>
                        <div class="form-group">
                        <?php echo Form::label('hardisk_total','hardisk_total'); ?>

                        <?php echo Form::text('hardisk_total',null,['class'=>'form-control']); ?>

                      </div>
                        <div class="form-group">
                        <?php echo Form::label(' hardisk_used',' hardisk_used'); ?>

                        <?php echo Form::text(' hardisk_used',null,['class'=>'form-control']); ?>

                      </div>
                        <div class="form-group">
                        <?php echo Form::label('utility_app',' utility_app'); ?>

                        <?php echo Form::text('utility_app',null,['class'=>'form-control']); ?>

                      </div>
                        <div class="form-group">
                        <?php echo Form::label('tech_location',' tech_location'); ?>

                        <?php echo Form::text('tech_location',null,['class'=>'form-control']); ?>

                      </div>
                        <div class="form-group">
                        <?php echo Form::label('ma_cost',' ma_cost'); ?>

                        <?php echo Form::text('ma_cost',null,['class'=>'form-control']); ?>

                      </div>
                       <div class="form-group">
                        <?php echo Form::label('remark',' remark'); ?>

                        <?php echo Form::text('remark',null,['class'=>'form-control']); ?>

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