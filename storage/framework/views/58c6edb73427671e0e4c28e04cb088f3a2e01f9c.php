<?php $__env->startSection('page_heading','Update'); ?>
<?php $__env->startSection('content'); ?>

<div class="container">
       <div class="row">
           <div class="col-md-10 col-md-offset-1">.

               <div class="panel panel-default">

                   <div class="panel-heading">Application</div>

                   <div class="panel-body">


                     <?php echo Form::model($app,array('route'=>['app.update',$app->id],'method'=>'PUT')); ?>



                      <div class="form-group">
                        <?php echo Form::label('name','ชื่อระบบ'); ?>

                        <?php echo Form::text('name',null,['class'=>'form-control']); ?>

                      </div>
                      <div class="form-group">
                        <?php echo Form::label('develop_language','ภาษาที่ใช้พัฒนา'); ?>

                        <?php echo Form::text('develop_language',null,['class'=>'form-control']); ?>

                      </div>
                      <div class="form-group">
                        <?php echo Form::label('app_database','ฐานข้อมูลระบบ'); ?>

                        <?php echo Form::text('app_database',null,['class'=>'form-control']); ?>

                      </div>
                      <div class="form-group">
                        <?php echo Form::label('develop_company','บริษัทที่พัฒนา'); ?>

                        <?php echo Form::text('develop_company',null,['class'=>'form-control']); ?>

                      </div>
                      <div class="form-group">
                        <?php echo Form::label('getting_start_years','ปีที่เริ่มพัฒนา'); ?>

                        <?php echo Form::text('getting_start_years',null,['class'=>'form-control']); ?>

                      </div>
                      <div class="form-group">
                        <?php echo Form::label('app_relation','สัมพันธ์กับระบบ'); ?>

                        <?php echo Form::text('app_relation',null,['class'=>'form-control']); ?>

                      </div>
                      <div class="form-group">
                        <?php echo Form::label('remark','รายละเอียดเพิ่มเติ่ม'); ?>

                        <?php echo Form::text('remark',null,['class'=>'form-control']); ?>

                      </div>
                      <div class="form-group">
                        <?php echo Form::label('ma_cost','ค่าซ่อมบำรุง'); ?>

                        <?php echo Form::text('ma_cost',null,['class'=>'form-control']); ?>

                      </div>
                      <div class="form-group">
                        <?php echo Form::label('department_id','หน่วยงานที่เกี่ยวข้อง'); ?>

                          <?php echo Form::select('department_id', $items, null, ['class' => 'form-control']); ?>

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