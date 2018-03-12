<?php $__env->startSection('page_heading','Update'); ?>
<?php $__env->startSection('content'); ?>

<div class="container">
       <div class="row">
           <div class="form-group"><h1 style="font-size:38px;">ความสัมพันธ์</h1></div>
           <div class="panel panel-default">
<?php $type = '1' ; ?>
                   <div class="panel-heading">ระบบสารสนเทศ</div>

                               <!-- /.panel-heading -->
                               <div class="panel-body" style="margin-right:20px;">
                                   <table width="100%" class="table">
                                       <thead>
                                       <tr>
                                           <th>ชื่อ</th>
                                           <th>ลบ</th>
                                       </tr>
                                       </thead>
                                       <?php $__currentLoopData = $a; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a1): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                       <tr>
                                           <td><?php echo e($a1->name); ?>  </td>
                                           <td>

                                               <a href="<?php echo e(action('TechController@delt' ,[$tech,$a1->id] )); ?>" class="btn btn-danger delrela"><span class="glyphicon glyphicon-remove"></span></a>                                           </td>
                                           </td>
                                       </tr>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                       <?php $__currentLoopData = $b; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b1): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                       <tr>
                                           <td><?php echo e($b1->name); ?>  </td>
                                           <td>
                                               <a href="<?php echo e(action('TechController@delt' ,[$tech,$b1->id] )); ?>" class="btn btn-danger delrela"><span class="glyphicon glyphicon-remove"></span></a>                                           </td>
                                           </td>
                                       </tr>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                       <?php $__currentLoopData = $d; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d1): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                       <tr>
                                           <td><?php echo e($d1->name); ?>  </td>
                                           <td>
                                               <a href="<?php echo e(action('TechController@delt' ,[$tech,$d1->id] )); ?>" class="btn btn-danger delrela"><span class="glyphicon glyphicon-remove"></span></a>                                           </td>
                                           </td>
                                       </tr>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                       <?php $__currentLoopData = $t; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t1): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                       <tr>
                                           <td><?php echo e($t1->name); ?>  </td>
                                           <td>
                                               <a href="<?php echo e(action('TechController@delt' ,[$tech,$t1->id] )); ?>" class="btn btn-danger delrela"><span class="glyphicon glyphicon-remove"></span></a>                                           </td>
                                       </tr>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                       <?php $__currentLoopData = $p; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p1): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                           <?php $type = 'p' ; ?>
                                           <tr>
                                               <td><?php echo e($p1->name); ?>  </td>
                                               <td>
                                                   <a href="<?php echo e(action('TechController@delt' ,[$tech,$p1->id] )); ?>" class="btn btn-danger delrela"><span class="glyphicon glyphicon-remove"></span></a>                                           </td>
                                           </tr>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                       <?php $__currentLoopData = $br; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $br1): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                           <?php $type = 'br' ; ?>
                                           <tr>
                                               <td><?php echo e($br1->name); ?>  </td>
                                               <td>
                                                   <a href="<?php echo e(action('TechController@delt' ,[$tech,$br1->id] )); ?>" class="btn btn-danger delrela"><span class="glyphicon glyphicon-remove"></span></a>                                           </td>
                                           </tr>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                                   </table>

                               </div>

                   </div>
               </div>

           </div>

    <script src="<?php echo e(asset('/assets/bower_components/jquery/dist/jquery.min.js')); ?>"></script>
    <script>
        $(document).ready(function() {



    </script>

    <?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>