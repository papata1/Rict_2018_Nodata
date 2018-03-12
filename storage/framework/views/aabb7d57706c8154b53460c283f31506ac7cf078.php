<?php $__env->startSection('page_heading'); ?>
<?php $__env->startSection('content'); ?>



<div class="container">
       <div class="row">
           <div class="col-md-10 col-md-offset-1">.

               <div class="panel panel-default">

                   <div class="panel-heading">Technology</div>

                   <div class="panel-body">
                     <p><a href="<?php echo e(action('AppController@index' ,[$t ='1'] )); ?>" class="btn btn-primary">Sever</a>

                     <a href="<?php echo e(action('AppController@index' ,[$t ='2'] )); ?>" class="btn btn-primary">Technology</a></p>

                 </div>
                  </div>
                  </div>
               </div>
               </div>
               <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>