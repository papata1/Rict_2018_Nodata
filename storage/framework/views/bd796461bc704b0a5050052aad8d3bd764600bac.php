<?php $__env->startSection('page_heading','Update'); ?>
<?php $__env->startSection('content'); ?>

<div class="container">
       <div class="row">
           <div class="form-group"><h1 style="font-size:38px;">ความสัมพันธ์</h1></div>
           <div class="panel panel-default">

                   <div class="panel-heading">ระบบสารสนเทศ</div>
                      <?php $type = '1' ; 
                             $a; 
                      ?>
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

                                               <a href="<?php echo e(action('AppController@del' ,[$app,$a1->id] )); ?>" class="btn btn-danger delrela"><span class="glyphicon glyphicon-remove"></span></a>                                           </td>
                                           </td>
                                       </tr>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                       <?php $__currentLoopData = $b; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b1): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                       <tr>
                                           <td><?php echo e($b1->name); ?>  </td>
                                           <td>
                                               <a href="<?php echo e(action('AppController@del' ,[$app,$b1->id] )); ?>" class="btn btn-danger delrela"><span class="glyphicon glyphicon-remove"></span></a>                                           </td>
                                           </td>
                                       </tr>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                       <?php $__currentLoopData = $d; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d1): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                       <tr>
                                           <td><?php echo e($d1->name); ?>  </td>
                                           <td>
                                               <a href="<?php echo e(action('AppController@del' ,[$app,$d1->id] )); ?>" class="btn btn-danger delrela"><span class="glyphicon glyphicon-remove"></span></a>                                           </td>
                                           </td>
                                       </tr>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                       <?php $__currentLoopData = $t; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t1): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                       <tr>
                                           <td><?php echo e($t1->name); ?>  </td>
                                           <td>
                                               <a href="<?php echo e(action('AppController@del' ,[$app,$t1->id] )); ?>" class="btn btn-danger delrela"><span class="glyphicon glyphicon-remove"></span></a>                                           </td>
                                       </tr>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                       <?php $__currentLoopData = $ud; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ud1): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                     
                                           <tr>
                                               <td><?php echo e($ud1->name); ?>  </td>
                                               <td>
                                                   <a href="<?php echo e(action('AppController@del' ,[$app,$ud1->id] )); ?>" class="btn btn-danger delrela"><span class="glyphicon glyphicon-remove"></span></a>                                           </td>
                                           </tr>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                       <?php $__currentLoopData = $de; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $de1): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                       
                                           <tr>
                                               <td><?php echo e($de1->name); ?>  </td>
                                               <td>
                                                   <a href="<?php echo e(action('AppController@del' ,[$app,$de1->id] )); ?>" class="btn btn-danger delrela"><span class="glyphicon glyphicon-remove"></span></a>                                           </td>
                                           </tr>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                       <?php $__currentLoopData = $dev; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dev1): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                      
                                           <tr>
                                               <td><?php echo e($dev1->name); ?>  </td>
                                               <td>
                                                   <a href="<?php echo e(action('AppController@del' ,[$app,$dev1->id] )); ?>" class="btn btn-danger delrela"><span class="glyphicon glyphicon-remove"></span></a>                                           </td>
                                           </tr>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                       <?php $__currentLoopData = $deg; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deg1): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                       
                                           <tr>
                                               <td><?php echo e($deg1->name); ?>  </td>
                                               <td>
                                                   <a href="<?php echo e(action('AppController@del' ,[$app,$deg1->id] )); ?>" class="btn btn-danger delrela"><span class="glyphicon glyphicon-remove"></span></a>                                           </td>
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