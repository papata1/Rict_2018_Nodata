<?php $__env->startSection('page_heading','Update'); ?>
<?php $__env->startSection('content'); ?>

<div class="container">
       <div class="row">
           <div class="col-md-6 col-md-offset-1"><br>

               <div class="panel panel-default">

                   <div class="panel-heading">องค์ประกอบอื่นๆ(Other Artifacts)
                   </div>

                   <div class="panel-body">


                     <?php echo Form::model($place,array('route'=>['odata.update',$place->id],'method'=>'PUT','novalidate' => 'novalidate','files' => true)); ?>



                                    <div class="form-group">
                                        <?php echo Form::label('name','ชื่อ'); ?>

                                        <?php echo Form::text('name',null,['class'=>'form-control']); ?>

                                    </div>

                                     <div class="form-group">

                           <?php if($place->pic): ?>
                               <?php echo Form::label('pic','รูปองค์ประกอบอื่นๆ(Other Artifacts) png,jpg'); ?><br>
                               <p><img src="<?php echo e(URL::to('/')); ?>/images/odata/<?php echo e($place->pic); ?>"  width="500" height="500" /></p>
                               <?php echo Form::file('pic',null,['class'=>'form-control']); ?><p></p>
                           <?php else: ?>

                               <?php echo Form::label('pic','รูปองค์ประกอบอื่นๆ(Other Artifacts) png,jpg'); ?><br ><p>ไม่มีไฟล์ </p>
                               <?php echo Form::file('pic',null,['class'=>'form-control']); ?>

                           <?php endif; ?>

                       </div>

                                     <div class="form-group">

                           <?php if($place->data): ?>
                               <?php echo Form::label('file','ไฟล์องค์ประกอบอื่นๆ(Other Artifacts) excel,word,pdf'); ?><br>
                               <p><a href="<?php echo e(action('OdataController@download' ,[$place->data])); ?>"><?php echo e($place->data); ?></a></p>
                               <?php echo Form::file('file',null,['class'=>'form-control']); ?>

                           <?php else: ?>

                               <?php echo Form::label('file','ไฟล์องค์ประกอบอื่นๆ(Other Artifacts) excel,word,pdf'); ?><br ><p>ไม่มีไฟล์ </p>
                               <?php echo Form::file('file',null,['class'=>'form-control']); ?>

                           <?php endif; ?>

                       </div>


                                    <div class="form-group">
                                        <?php echo Form::button('บันทึก',['type'=>'submit','class'=>'btn btn-primary']); ?>

                                        <?php echo e(link_to_route('odata.index','ย้อนกลับ',null,['class'=>'btn btn-danger'])); ?>

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