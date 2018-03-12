<?php $__env->startSection('page_heading'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
  			<div class="form-group"><h1 style="font-size:38px;">Department</h1></div>

         <h3>Import</h3>
    <form action="deImport" method = "post" enctype="multipart/form-data" >
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" >
        <div class="custom_file_upload">
            <input type="text" class="file" name="file_info">
            <div class="file_upload">
                <input type="file" >
            </div>
        </div>
                <input type="submit" value="Import" class="btn btn-success">
            </form>
            <h3>download template ที่ใช้ในการ upload</h3>
            <button class="btn btn-primary">Download</button><br><br>
    <?php if(Session::has('message')): ?>
<div class="alert alert-success"><?php echo e(Session::get('message')); ?></div>
<?php endif; ?>
<div class="bs-example" data-example-id="bordered-table">
<div class="panel panel-default" >
    <div class="panel-heading">
        Department Tables
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body" style="margin-right:20px;">
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
          <thead>
            <tr>
              <th>id</th>
                <th>Name</th>
                <th>Remark</th>
            </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $des; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $de): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <tr>
                     <td><?php echo e($de->id); ?>  </td>
                     <td><?php echo e($de->name); ?>  </td>
                     <td><?php echo e($de->remark); ?>  </td>
                         <td>
                           <?php echo Form::open(array('route'=>['de.destroy',$de->id],'method'=>'DELETE')); ?>

                        <?php echo e(link_to_route('de.edit','Edit',[$de->id],['class'=>'btn btn-primary','id'=>'a'])); ?>

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
<?php echo e(link_to_route('de.create','Add New ',null,['class'=>'btn btn-success'])); ?>


</div>
    <style>
        body {
            font-family: 'Lucida Grande', 'Helvetica Neue', sans-serif;
            font-size: 13px;
        }

        div.custom_file_upload {
            width: 230px;
            height: 20px;
            margin: 40px auto;
        }

        input.file {
            width: 150px;
            height: 20px;
            border: 1px solid #BBB;
            border-right: 0;
            color: #888;
            padding: 5px;

            -webkit-border-top-left-radius: 5px;
            -webkit-border-bottom-left-radius: 5px;
            -moz-border-radius-topleft: 5px;
            -moz-border-radius-bottomleft: 5px;
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;

            outline: none;
        }

        div.file_upload {
            width: 80px;
            height: 24px;
            background: #7abcff;
            background: -moz-linear-gradient(top,  #7abcff 0%, #60abf8 44%, #4096ee 100%);
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#7abcff), color-stop(44%,#60abf8), color-stop(100%,#4096ee));
            background: -webkit-linear-gradient(top,  #7abcff 0%,#60abf8 44%,#4096ee 100%);
            background: -o-linear-gradient(top,  #7abcff 0%,#60abf8 44%,#4096ee 100%);
            background: -ms-linear-gradient(top,  #7abcff 0%,#60abf8 44%,#4096ee 100%);
            background: linear-gradient(top,  #7abcff 0%,#60abf8 44%,#4096ee 100%);
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#7abcff', endColorstr='#4096ee',GradientType=0 );

            display: inline;
            position: absolute;
            overflow: hidden;
            cursor: pointer;

            -webkit-border-top-right-radius: 5px;
            -webkit-border-bottom-right-radius: 5px;
            -moz-border-radius-topright: 5px;
            -moz-border-radius-bottomright: 5px;
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;

            font-weight: bold;
            color: #FFF;
            text-align: center;
            padding-top: 8px;
        }
        div.file_upload:before {
            content: 'UPLOAD';
            position: absolute;
            left: 0; right: 0;
            text-align: center;

            cursor: pointer;
        }

        div.file_upload input {
            position: relative;
            height: 30px;
            width: 250px;
            display: inline;
    </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>