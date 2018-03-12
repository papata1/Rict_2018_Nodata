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
                            <label for="name">รหัสกระบวนการ</label>
                            <input type="text" class="form-control txt1" name="name1" id="t0" disabled>
                            <label for="name">ชื่อกระบวนการ</label>
                            <input type="text" class="form-control txt1" name="lname1" id="t1" disabled>
                            <label for="divi">กระบวนการทำงาน</label>
                            <input type="text" class="form-control txt1" name="divi1" id="t2" disabled>
                            <label for="tel">หน่วยงานที่เกี่ยวข้อง</label>
                            <input type="text" class="form-control txt1" name="tel1" id="t4" disabled>
                            <label for="email">รายละเอียดเพิ่มเติม</label>
                            <textarea type="text" class="form-control txt1" name="email1" id="t3" disabled></textarea>
                          
                            
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
  			<div class="form-group"><h1 style="font-size:38px;">BUSSINESS</h1></div>

        <h2>Import</h2>
    <div class="row">
            <form action="busImport" method = "post" enctype="multipart/form-data">

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
        Bussiness Tables
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body" style="margin-right:20px;">
        <table width="100%" class="table" id="dataTables-example">
          <thead>
            <tr>
                <th>รหัสกระบวนการ</th>
                <th>ชื่อกระบวนการ</th>
                <th>จัดการลำดับ</th>
                <th>จัดการ</th>
            </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $buss; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bus): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <tr>
                     <td><?php echo e($bus->id); ?>  </td>
                     <td><?php echo e($bus->name); ?>  </td>

                      <td>                  <a href="<?php echo e(action('BusController@moveup' ,[$bus->id] )); ?>" class="btn btn-default"><span class="glyphicon glyphicon-arrow-up"></span></a>
                  <a href="<?php echo e(action('BusController@movedown' ,[$bus->id] )); ?>" class="btn btn-default"><span class="glyphicon glyphicon-arrow-down"></span></a> </td>
              
                         <td>
                           <?php echo Form::open(array('route'=>['bus.destroy',$bus->id],'method'=>'DELETE')); ?>

                           <a href="<?php echo e(action('BusController@relation' ,[$bus->id] )); ?>" class="btn btn-default">add</a>
                           <button type="button" class="btn btn-success"  id="add" data-id="<?php echo e($bus->id); ?>" data-id1="<?php echo e($bus->name); ?>"
                          data-id2="<?php echo e($bus->workflow_path); ?>"   data-id3="<?php echo e($bus->remark); ?>" 
                          data-id4="<?php echo e($bus->department_id); ?>"   
                  >Show</button>
                           <?php echo e(link_to_route('bus.edit','Edit',[$bus->id],['class'=>'btn btn-primary'])); ?>

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
<script>
  $(document).ready(function() {
    $('#dataTables-example').DataTable({
      responsive: true

    });
  });
  </script>
Chat Conversation End

<!-- /.panel -->
<?php echo e(link_to_route('bus.create','Add New ',null,['class'=>'btn btn-success'])); ?>

</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>