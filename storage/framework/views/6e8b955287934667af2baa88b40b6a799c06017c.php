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
                            <label for="lname">ชื่ออุปกรณ์</label>
                            <input type="text" class="form-control txt1" name="lname1" id="t1" disabled>
                            <label for="divi">สเปค</label>
                            <input type="text" class="form-control txt1" name="divi1" id="t2" disabled>
                            <label for="email">รุ่น</label>
                            <input type="text" class="form-control txt1" name="email1" id="t3" disabled>
                            <label for="tel">ยี่ห้อ</label>
                            <input type="text" class="form-control txt1" name="tel1" id="t4" disabled>
                            <label for="addre">ระบบที่เกี่ยวข้อง</label>
                            <input type="text" class="form-control txt1" name="addre1" id="t5" disabled>
                            <label for="addre">ปีที่จัดซื้อ</label>
                            <input type="text" class="form-control txt1" name="addre1" id="t6" disabled>
                            <label for="addre">จำนวน</label>
                            <input type="text" class="form-control txt1" name="addre1" id="t7" disabled>
                            <label for="addre">ระบบปฏิบัติการ</label>
                            <input type="text" class="form-control txt1" name="addre1" id="t8" disabled>
                            <label for="addre">CPU USE</label>
                            <input type="text" class="form-control txt1" name="addre1" id="t8" disabled>
                            <label for="addre">Memory Total</label> 
                            <input type="text" class="form-control txt1" name="addre1" id="t8" disabled>
                            <label for="addre">Memory Used</label>
                            <input type="text" class="form-control txt1" name="addre1" id="t8" disabled>
                            <label for="addre">Hardisk Total</label>
                            <input type="text" class="form-control txt1" name="addre1" id="t8" disabled>
                            <label for="addre">Hardisk Used</label>
                            <input type="text" class="form-control txt1" name="addre1" id="t8" disabled>
                            <label for="addre">Utility Application</label>
                            <input type="text" class="form-control txt1" name="addre1" id="t8" disabled>
                            <label for="addre">สถานที่ตั้ง</label>
                            <input type="text" class="form-control txt1" name="addre1" id="t8" disabled>
                            <label for="addre">ค่าซ่อมบำรุง</label>
                            <input type="text" class="form-control txt1" name="addre1" id="t8" disabled>
                            <label for="addre">รายละเอียด</label>
                            <input type="text" class="form-control txt1" name="addre1" id="t9" disabled>
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
  			<div class="form-group"><h1 style="font-size:38px;">Technology</h1></div>

            <h2>Import</h2>
    <div class="row">
            <form action="techImport" method = "post" enctype="multipart/form-data">

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
        Technology Tables
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body" style="margin-right:20px;">
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
          <thead>
                  <tr>
                    <th>ลำดับ</th>
                    <th>ชื่ออุปกรณ์</th>
                    <th>ยี่ห้อ</th>
                    <th>ปีที่เริ่มใช้</th>
                    <th>จัดการลำดับ</th>
                    <th>จัดการ</th>
                  </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $techs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tech): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
          <tr>
            <td><?php echo e($tech->id); ?>  </td>
            <td><?php echo e($tech->name); ?>  </td>
            <td><?php echo e($tech->brand); ?>  </td>
            <td><?php echo e($tech->model); ?>  </td>
              <td>                  <a href="<?php echo e(action('TechController@moveup' ,[$tech->id] )); ?>" class="btn btn-default"><span class="glyphicon glyphicon-arrow-up"></span></a>
                  <a href="<?php echo e(action('TechController@movedown' ,[$tech->id] )); ?>" class="btn btn-default"><span class="glyphicon glyphicon-arrow-down"></span></a> </td>
              <td>
                  <?php echo Form::open(array('route'=>['tech.destroy',$tech->id],'method'=>'DELETE')); ?>

                 <a href="<?php echo e(action('TechController@relation' ,[$tech->id] )); ?>" class="btn btn-default">Add</a>
                  <button type="button" class="btn btn-success"  id="add" data-id="<?php echo e($tech->id); ?>" data-id1="<?php echo e($tech->name); ?>"   data-id2="<?php echo e($tech->brand); ?>"
                          data-id3="<?php echo e($tech->model); ?>"   data-id4="<?php echo e($tech->tech_spec); ?>"    data-id5="<?php echo e($tech->amount); ?>"  data-id6="<?php echo e($tech->operating_system); ?>"
                          data-id7="<?php echo e($tech->cpu_use); ?>"   data-id8="<?php echo e($tech->memory_total); ?>"    data-id9="<?php echo e($tech->memory_used); ?>"
                  >Show</button>
                  <?php echo e(link_to_route('tech.edit','Edit',[$tech->id],['class'=>'btn btn-primary'])); ?>

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
<?php echo e(link_to_route('tech.create','Add New ',null,['class'=>'btn btn-success'])); ?>

</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>