<?php $__env->startSection('page_heading','Crate'); ?>
<?php $__env->startSection('content'); ?>

<div class="container">
       <div class="row">
           <div class="col-md-6 col-md-offset-1">.

               <div class="panel panel-default">

                   <div class="panel-heading">ยี่ห้อ</div>

                   <div class="panel-body">

                     <?php echo Form::open(array('route'=>'brand.store','class' => 'form',
        'novalidate' => 'novalidate',
        'files' => true)); ?>


                                  <div class="form-group">
                                      <?php echo Form::label('name','ชื่อ'); ?>

                                      <?php echo Form::text('name',null,['class'=>'form-control']); ?>

                                  </div>
                                    <div class="form-group">
                                        <?php echo Form::button('เพิ่มยี่ห้อ',['type'=>'submit','class'=>'btn btn-primary']); ?>

                                        <?php echo e(link_to_route('brand.index','ย้อนกลับ',null,['class'=>'btn btn-danger'])); ?>

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