<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Bootstrap Core CSS -->
    <?php echo $__env->make('admin.layouts.inc-stylesheet', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->yieldContent('stylesheet'); ?>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                </button>
                <a class="navbar-brand" href="index.html">Admin</a>
            </div>
            <!-- /.navbar-header -->

            <?php echo $__env->make('admin.layouts.inc-header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!-- /.navbar-top-links -->

            <?php echo $__env->make('admin.layouts.inc-left-sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <?php echo $__env->yieldContent('content'); ?>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
	<?php echo $__env->make('admin.layouts.inc-scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->yieldContent('scripts'); ?>
</body>
<!-- DataTables CSS -->
<link href="vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

<!-- DataTables JavaScript -->
<script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="vendor/datatables-responsive/dataTables.responsive.js"></script>

</html>

<script type="text/javascript">
    $(document).ready(function() {

        $('#dataTables-example').DataTable({
          responsive: true

        });
        $('#add').click(function () {
           //alert('add new branch');
            $('#Add').modal('show');
            $('#t0').val($(this).attr('data-id'));
            $('#t1').val($(this).attr('data-id1'));
            $('#t2').val($(this).attr('data-id2'));
            $('#t3').val($(this).attr('data-id3'));
            $('#t4').val($(this).attr('data-id4'));
            $('#t5').val($(this).attr('data-id5'));
            $('#t6').val($(this).attr('data-id6'));
            $('#t7').val($(this).attr('data-id7'));
            $('#t8').val($(this).attr('data-id8'));
            $('#t9').val($(this).attr('data-id9'));

        });


    });

</script>
