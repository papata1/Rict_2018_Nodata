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
                            <label for="name">id</label>
                            <input type="text" class="form-control txt1" name="name1" id="t0">
                            <label for="name">name</label>
                            <input type="text" class="form-control txt1" name="lname1" id="t1">
                            <label for="divi">type</label>
                            <input type="text" class="form-control txt1" name="divi1" id="t2">
                            <label for="email">remark</label>
                            <input type="text" class="form-control txt1" name="email1" id="t3">

                            
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
  			<div class="form-group"><h1 style="font-size:38px;">Data</h1></div>
    <?php if(Session::has('message')): ?>
<div class="alert alert-success"><?php echo e(Session::get('message')); ?></div>
<?php endif; ?>
<div class="bs-example" data-example-id="bordered-table">
<div class="panel panel-default" >
    <div class="panel-heading">
        Data Tables
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body" style="margin-right:20px;">
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
          <thead>
            <tr>
              <th>id</th>
                <th>name</th>
                <th>remark</th>
                <th>move</th>
                <th>Action</th>
            </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $dats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dat): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <tr>
                     <td><?php echo e($dat->id); ?>  </td>
                     <td><?php echo e($dat->name); ?>  </td>
                     <td><?php echo e($dat->remark); ?>  </td>
                      <td>                  <a href="<?php echo e(action('BusController@moveup' ,[$bus->id] )); ?>" class="btn btn-default"><span class="glyphicon glyphicon-arrow-up"></span></a>
                  <a href="<?php echo e(action('BusController@movedown' ,[$bus->id] )); ?>" class="btn btn-default"><span class="glyphicon glyphicon-arrow-down"></span></a> </td>
                         <td>
                           <?php echo Form::open(array('route'=>['dat.destroy',$dat->id],'method'=>'DELETE')); ?>

                            <button type="button" class="btn btn-success"  id="add" data-id="<?php echo e($dat->id); ?>" data-id1="<?php echo e($dat->name); ?>"
                          data-id2="<?php echo e($dat->type); ?>"   data-id3="<?php echo e($dat->remark); ?>"   
                  >Show</button>
                           <?php echo e(link_to_route('dat.edit','Edit',[$dat->id],['class'=>'btn btn-primary'])); ?>

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
<?php echo e(link_to_route('dat.create','Add New ',null,['class'=>'btn btn-success'])); ?>

</div>
<h1></h1>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>