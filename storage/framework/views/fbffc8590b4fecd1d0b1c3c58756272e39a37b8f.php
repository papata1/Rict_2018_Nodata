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
				<center><?php echo Html::image('images\banner.jpg'); ?></center>
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
								<?php $typee=""; ?>
								<?php $__currentLoopData = $model; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modell): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
								<?php switch ($modell->type) {
									case '1':
									$typee = 'เครื่องแม่ข่าย';
									break;
									case '2':
									$typee = 'อุปกรณ์';
									break;
								}?>
								<div class="panel-heading">
									<a href="<?php echo url('main/Tec'); ?>"> เทคโนโลยี</a> > <?php echo e($modell->name); ?>

								</div>
								<div class="panel-body">
									<div class="table-responsive">
										<!-- Start: table content -->
										<table class="table table-bordered table-hover" id="sample-table-1">
											<tr><td>รหัส</td><td><?php echo e($modell->id); ?></td></tr>
											<tr><td>ชื่อ</td><td><?php echo e($modell->name); ?></td></tr>
											<tr><td>ยี่ห้อ</td><td>
												<?php $__currentLoopData = $model3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modell3): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
												<?php if($modell->brand==$modell3->id)echo" - ".$modell3->name; ?>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
											</td></tr>
											<tr><td>รุ่น</td><td><?php echo e($modell->model); ?></td></tr>
											<tr><td>สเปค</td><td><?php echo e($modell->tech_spec); ?></td></tr>
											<tr><td>จำนวน</td><td><?php echo e($modell->amount); ?></td></tr>
											<tr><td>ระบบประฏิบัติการ</td><td><?php echo e($modell->operating_system); ?></td></tr>
											<tr><td>ซีพียูที่ใช้</td><td><?php echo e($modell->cpu_use); ?></td></tr>
											<tr><td>เมโมรี่ที่มี</td><td><?php echo e($modell->memory_total); ?></td></tr>
											<tr><td>เมโมรี่ที่ใช้</td><td><?php echo e($modell->memory_used); ?></td></tr>
											<tr><td>หน่วยความจำที่มี</td><td><?php echo e($modell->hardisk_total); ?></td></tr>
											<tr><td>หน่วยความจำที่ใช้</td><td><?php echo e($modell->hardisk_used); ?></td></tr>
											<tr><td>ระบบสารสนเทศที่เกี่ยวข้อง</td><td>
												<?php $__currentLoopData = $model2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modell2): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
												<a href="<?php echo url('main/AppDetail/'. $modell2->alid ); ?>">
 - <?php echo e($modell2->alname); ?></a><br>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
												</td></tr>
												<tr><td width="200">สถานที่ตั้ง</td><td>
													<?php $__currentLoopData = $model4; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modell4): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
													<?php if($modell->tech_location==$modell4->id)echo" - ".$modell4->name; ?>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
												</td></tr>
												<tr><td>ค่าซ่อมบำรุงต่อปี</td><td><?php echo e($modell->ma_cost); ?></td></tr>
												<tr><td>รายละเอียด</td><td><?php echo e($modell->remark); ?></td></tr>
												<tr><td>ประเภท</td><td><?php echo$typee; ?></td></tr>
												<tr><td colspan="2">
													<a class="button btn btn-success" 
													<?php if($modell->file!=NULL){
														echo 'onclick="dload()"';
													}?>

													<?php if($modell->file==NULL){
														echo 'onclick="nothing()"';
													}?>
													>เอกสาร Specification</a>
												</td></tr>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
											</table>
											<script>
												function nothing() {
													alert("ไม่พบข้อมูล");
												}
											</script>
											<script>
												function dload() {
													window.location="<?php echo e(asset('/downloadtec/'.$modell->file)); ?>";
												}
											</script>
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
			<script>
				jQuery(document).ready(function() {
					Main.init();
				});
			</script>
		</body>
		<!-- end: BODY -->
		</html>
