<?php $__env->startSection('page_heading','Update'); ?>
<?php $__env->startSection('content'); ?>

<div class="container">
       <div class="row">
           <div class="col-md-6 col-md-offset-1">.

               <div class="panel panel-default">

                   <div class="panel-heading">ตัวย่อ</div>

                   <div class="panel-body">
                       <?php $__currentLoopData = $brand1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                           <form action="updateDat" method = "post" >
                               <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" >
                       <?php echo Form::label('name','ชื่อ'); ?>

                       <p> <?php echo e($brand->name); ?></p>
                                    <div class="form-group">
                                        <?php echo Form::label('initial','ตัวย่อ'); ?>

                                  <p><input type="text" id="initial" name="initial" value="<?php echo e($brand->initial); ?>" class="form-control">   </p>
                                    </div>

                                        <input type="submit" value="บันทึก" class="btn btn-primary" >


                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                           </form>

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