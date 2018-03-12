<div class="modal fade pic1" id="pic" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
xmlns="http://www.w3.org/1999/html">
<div class="modal-dialog">
   <div class="modal-content">
	   <div class="modal-header">
		   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		   <h4 class="modal-title" id="myModalLabel">รูปกระบวนการทำงาน</h4>
	   </div>
	   <div class="modal-body">
		   <div class="row">
			   <div class="col-sm-2"></div>
			   <div class="col-sm-8">
				   <div class="modal-body">
					   <img src="" id="imagepreview" style="width: 400px; height: 264px;" >
					   <div id="t01"></div>
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
<!DOCTYPE html>
<!-- Template Name: Clip-One - Responsive Admin Template build with Twitter Bootstrap 3.x Version: 1.4 Author: ClipTheme -->
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- start: HEAD -->
<head>
<title>EA DOCUMENT REPOSITORY</title>
<!-- start: META -->
<meta charset="utf-8" />
<!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta content="" name="description" />
<meta content="" name="author" />
<!-- end: META -->
<!-- start: MAIN CSS -->
<link rel="stylesheet" href="<?php echo e(URL::asset('css/theme/plugins/bootstrap/css/bootstrap.min.css')); ?>" >
<link rel="stylesheet" href="<?php echo e(URL::asset('css/theme/plugins/font-awesome/css/font-awesome.min.css')); ?>" >
<link rel="stylesheet" href="<?php echo e(URL::asset('css/theme/fonts/style.css')); ?>" >
<link rel="stylesheet" href="<?php echo e(URL::asset('css/theme/css/main.css')); ?>" >
<link rel="stylesheet" href="<?php echo e(URL::asset('css/theme/css/main-responsive.css')); ?>" >
<link rel="stylesheet" href="<?php echo e(URL::asset('css/theme/plugins/iCheck/skins/all.css')); ?>" >
<link rel="stylesheet" href="<?php echo e(URL::asset('css/theme/plugins/bootstrap-colorpalette/css/bootstrap-colorpalette.css')); ?>" >
<link rel="stylesheet" href="<?php echo e(URL::asset('css/theme/plugins/perfect-scrollbar/src/perfect-scrollbar.css')); ?>" >
<link rel="stylesheet" href="<?php echo e(URL::asset('css/theme/css/theme_light.css')); ?>" >
<link rel="stylesheet" href="<?php echo e(URL::asset('css/theme/css/print.css')); ?>" >
   <link rel="shortcut icon" href="<?php echo e(URL::asset('images/kmutnb.ico')); ?>" />

   <!--[if IE 7]>
   <link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome-ie7.min.css">
   <![endif]-->
   <!-- end: MAIN CSS -->
   <!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
   <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
</head>
<!-- end: HEAD -->
<!-- start: BODY -->
<body>
   <div class="page-container container">
	   <div class="form-group">
		   <center><?php echo Html::image('images\banner3.jpg'); ?></center>
	   </div>
	   <div style="text-align:center">
		   <?php echo $__env->make('front.topnav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	   </div> 
	   <!-- start: MAIN CONTAINER -->
	   <div class="main-container">
		   <!-- start: PAGE -->
		   <!-- /.modal -->
		   <!-- end: SPANEL CONFIGURATION MODAL FORM -->
		   <div class="container">

			   <!-- start: PAGE CONTENT -->
			   <div class="row">
				   <div class="col-md-12">
					   <!-- start: RESPONSIVE TABLE PANEL -->
					   <div class="panel panel-default">
						   
						   <div class="panel-heading">
							   <a href="<?php echo url('main/Bus'); ?>"> กระบวนการ</a> > ระดับกระบวนการ
						   </div>
						   <div class="panel-body">
							   <div class="table-responsive">
								   <!-- Start: table content -->
								   
								   <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
									   <tr><td width="200">กระบวนการระดับที่ </td><td><?php echo $lv ?></td></tr>
									   <tr><td>ชื่อกระบวนการ</td><td>
									   <?php if($lv == 1): ?>
									   <?php echo e($model-> n1); ?>

									   <?php elseif($lv == 2): ?>
									   <?php echo e($model-> n2); ?>

									   <?php else: ?>
									  <?php echo e($model-> n3); ?>

									   <?php endif; ?>	
									   </td></tr>
									   <tr><td>ตัวย่อ</td><td>
									   <?php if($lv == 1): ?>
									   <?php echo e($model-> s1); ?>

									   <?php elseif($lv == 2): ?>
									   <?php echo e($model-> s1); ?><?php echo e($model-> s2); ?>

									   <?php else: ?>
									   <?php echo e($model-> s1); ?><?php echo e($model-> s2); ?><?php echo e($model-> s3); ?>

									   <?php endif; ?>
									   </td></tr>

									   
									   <tr><td>กระบวนการที่เกี่ยวข้อง</td><td>
									   
									
									   <?php $__currentLoopData = $model1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $model): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
										
											
										<?php if($lv== 1): ?>
										<a href="<?php echo url('main/lv/2/'. $model->id2 ); ?>">
										- <?php echo e($model-> n2); ?></a><br>
											
										<?php elseif($lv== 2): ?>
										<a href="<?php echo url('main/lv/3/'. $model->id3 ); ?>">
										- <?php echo e($model-> n3); ?></a><br>
										<?php elseif($lv== 3): ?>
										<a href="<?php echo url('main/BusDetail/'. $model->iden ); ?>">
										- <?php echo e($model-> n); ?></a><br>
										<?php endif; ?>	

										<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
											</td></tr>

									   <tr><td>รายละเอียด</td><td>
									   <?php if($lv == 1): ?>
									   <?php echo e($model-> remark1); ?>

									   <?php elseif($lv == 2): ?>
									   <?php echo e($model-> remark2); ?>

									   <?php else: ?>
									  <?php echo e($model-> remark3); ?>

									   <?php endif; ?>
									   </td></tr>
								   </table>
								   
										   
										   <!-- End: table content -->
									   </div>
								   </div>
							   </div>
							   <!-- end: RESPONSIVE TABLE PANEL -->
						   </div>
					   </div>
					   <!-- end: PAGE CONTENT-->
				   </div>
			   </div>
			   <!-- end: PAGE -->
			   <!-- end: MAIN CONTAINER -->
		   </div>
		   <!-- start: MAIN JAVASCRIPTS -->
		   <script src="<?php echo e(URL::asset('css/theme/plugins/jQuery-lib/2.0.3/jquery.min.js')); ?>"></script>
		   <!--<![endif]-->
		   <script src="<?php echo e(URL::asset('css/theme/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js')); ?>"></script>
		   <script src="<?php echo e(URL::asset('css/theme/plugins/bootstrap/js/bootstrap.min.js')); ?>"></script>
		   <script src="<?php echo e(URL::asset('css/theme/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')); ?>"></script>
		   <script src="<?php echo e(URL::asset('css/theme/plugins/blockUI/jquery.blockUI.js')); ?>"></script>
		   <script src="<?php echo e(URL::asset('css/theme/plugins/iCheck/jquery.icheck.min.js')); ?>"></script>
		   <script src="<?php echo e(URL::asset('css/theme/plugins/perfect-scrollbar/src/jquery.mousewheel.js')); ?>"></script>
		   <script src="<?php echo e(URL::asset('css/theme/plugins/perfect-scrollbar/src/perfect-scrollbar.js')); ?>"></script>
		   <script src="<?php echo e(URL::asset('css/theme/plugins/less/less-1.5.0.min.js')); ?>"></script>
		   <script src="<?php echo e(URL::asset('css/theme/plugins/jquery-cookie/jquery.cookie.js')); ?>"></script>
		   <script src="<?php echo e(URL::asset('css/theme/plugins/bootstrap-colorpalette/js/bootstrap-colorpalette.js')); ?>"></script>
		   <script src="<?php echo e(URL::asset('css/theme/js/main.js')); ?>"></script>

		   <!-- end: MAIN JAVASCRIPTS -->
		   <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		   <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
				   <script type="text/javascript">
											   $(document).ready(function() {
													   Main.init();
							   
											   });	
										   </script>

	   </body>
	   <!-- end: BODY -->
	   </html>