<?php $__env->startSection('page_heading'); ?>
<?php $__env->startSection('content'); ?>
<!--Modal add -->
<div class="modal fade" id="Add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
     xmlns="http://www.w3.org/1999/html">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Show</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label for="name">ลำดับ</label>
                            <input type="text" class="form-control txt1" name="name1" id="t0" disabled>
                            <label for="lname">ชื่อระบบ</label>
                            <input type="text" class="form-control txt1" name="lname1" id="t1" disabled>
                            <label for="divi">ภาษาที่ใช้พัฒนา</label>
                            <input type="text" class="form-control txt1" name="divi1" id="t2" disabled>
                            <label for="email">ฐานข้อมูลระบบ</label>
                            <input type="text" class="form-control txt1" name="email1" id="t3" disabled>
                            <label for="tel">บริษัทที่พัฒนา</label>
                            <input type="text" class="form-control txt1" name="tel1" id="t4" disabled>
                            <label for="addre">ปีที่เริ่มพัฒนา</label>
                            <input type="text" class="form-control txt1" name="addre1" id="t5" disabled>
                            <label for="addre">สัมพันธ์กับระบบ</label>
                            <input type="text" class="form-control txt1" name="addre1" id="t6" disabled>
                            <label for="addre">ค่าซ่อมบำรุง</label>
                            <input type="text" class="form-control txt1" name="addre1" id="t8" disabled>
                            <label for="addre">หน่วยงานที่เกี่ยวข้อง</label>
                            <input type="text" class="form-control txt1" name="addre1" id="t9" disabled>
                            <label for="addre">รายละเอียดเพิ่มเติ่ม</label>
                            <textarea type="text" class="form-control txt1" name="addre1" id="t7" disabled></textarea>
                        </div>
                    </div>
                    <div class="col-sm-2"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>

            </div>
        </div>
    </div>
</div>
<div class="container">
  			<div class="form-group"><h1 style="font-size:38px;">Application</h1></div>

            <h2>Import</h2>
    <div class="row">
            <form action="appImport" method = "post" enctype="multipart/form-data">

                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" >
                <input type="file" name="appImport" class="form-group col-xs-3">
                <input type="submit" value="Import" >
     </div>
            </form>



    <?php if(Session::has('message')): ?>
<div class="alert alert-success"><?php echo e(Session::get('message')); ?></div>
<?php endif; ?>
<div class="bs-example" data-example-id="bordered-table">
<div class="panel panel-default" >
    <div class="panel-heading">
        Application Tables
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body" style="margin-right:20px;">
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
          <thead>
                  <tr>
                    <th>ลำดับ</th>
                    <th>ชื่อ</th>
                    <th>ภาษาที่ใช้พัฒนา</th>
                    <th>ฐานข้อมูลระบบ</th>
                      <th>จัดการลำดับ</th>
                    <th>จัดการ</th>
                  </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $apps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
          <tr>
            <td><?php echo e($app->id); ?>  </td>
            <td><?php echo e($app->name); ?>  </td>
            <td><?php echo e($app->develop_language); ?>  </td>
            <td><?php echo e($app->app_database); ?>  </td>

            <td>                 <a href="<?php echo e(action('AppController@moveup' ,[$app->id] )); ?>" class="btn btn-default"><span class="glyphicon glyphicon-arrow-up"></span></a>
                  <a href="<?php echo e(action('AppController@movedown' ,[$app->id] )); ?>" class="btn btn-default"><span class="glyphicon glyphicon-arrow-down"></span></a> </td>
              <td>
                  <?php echo Form::open(array('route'=>['app.destroy',$app->id],'method'=>'DELETE')); ?>

                  <a href="<?php echo e(action('AppController@relation' ,[$app->id] )); ?>" class="btn btn-default">Add</a>
                  <button type="button" class="btn btn-success"  id="add" data-id="<?php echo e($app->id); ?>" data-id1="<?php echo e($app->name); ?>"   data-id2="<?php echo e($app->develop_language); ?>"
                          data-id3="<?php echo e($app->app_database); ?>"   data-id4="<?php echo e($app->develop_company); ?>"    data-id5="<?php echo e($app->getting_start_years); ?>"  data-id6="<?php echo e($app->app_relation); ?>"
                          data-id7="<?php echo e($app->remark); ?>"   data-id8="<?php echo e($app->ma_cost); ?>"    data-id9="<?php echo e($app->department_id); ?>"
                  >Show</button>
                  <?php echo e(link_to_route('app.edit','Edit',[$app->id],['class'=>'btn btn-primary'])); ?>

                  <?php echo Form::button('Delete',['class'=>'btn btn-danger','type'=>'submit']); ?>

                  <?php echo Form::close(); ?>

                </td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
              </tbody>
        </table>

    </div>
    <!-- /.panel-body -->
</div>
<!-- /.panel -->
<?php echo e(link_to_route('app.create','Add New ',null,['class'=>'btn btn-success'])); ?>

</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>