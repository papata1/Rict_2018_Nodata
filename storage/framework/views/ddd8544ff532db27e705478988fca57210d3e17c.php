<?php echo $__env->make('front.css', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!DOCTYPE HTML>
<!--
Imagination by TEMPLATED
templated.co @templatedco
Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
<head>
	<title>EA DOCUMENT REPOSITORY</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />

</head>
<body class="homepage">

<?php echo $__env->make('front.extra', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

			<!-- Main -->
	<div id="main">
		<div class="container">
			<div class="form-group"><h1 style="font-size:38px;">BUSSINESS</h1></div>
			<div class="form-group">
		<div class="bs-example" data-example-id="bordered-table">
		<div class="panel panel-default" >
				<div class="panel-heading">
						DataTables Advanced Tables
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body" style="margin-right:20px;">

				<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
							<thead>
											<tr>
													<th><center>รหัส</center></th>
													<th><center>ชื่อ</center></th>
													<th><center>ภาษาที่ใช้พัฒนา</center></th>
													<th><center>ฐานข้อมูล</center></th>
													<th><center>บริษัที่ทำการพัฒนา</center></th>
													<th><center>ปีที่เริ่มใช้งาน</center></th>
													<th><center>แอพพลิเคชั่นที่เกี่ยวข้อง</center></th>
													<th><center>ข้อสังเกต</center></th>
													<th><center>ค่าซ่อมบำรุง</center></th>
													<th><center>หน่วยงานที่เกี่ยวข้อง</center></th>
											</tr>
									</thead>
									<tbody>
						<?php $__currentLoopData = $model; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $model): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
							<tr onclick="document.location = 'AppDetail<?php echo e($model->id); ?>';">
							<th scope="row"><?php echo e($model->id); ?></th>
					 		<td><?php echo e($model->name); ?></td>
							<td><?php echo e($model->develop_language); ?></td>
							<td><?php echo e($model->app_database); ?></td>
							<td><?php echo e($model->develop_company); ?></td>
							<td><?php echo e($model->getting_start_years); ?></td>
							<td><?php echo e($model->app_relation); ?></td>
							<td><?php echo e($model->remark); ?></td>
							<td><?php echo e($model->ma_cost); ?></td>
							<td><?php echo e($model->dname); ?></td>
					  	</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
						    	</tbody>
				</table>
				</div>
				<!-- /.panel-body -->
		</div>
		<!-- /.panel -->
	</div>



</div>
</div>
</div>
	<!-- /Main -->



	<!-- Copyright -->
	<div id="copyright">
		<div class="container">
			Design: <a href="http://templated.co">TEMPLATED</a> Images: <a href="http://unsplash.com">Unsplash</a> (<a href="http://unsplash.com/cc0">CC0</a>)
		</div>
	</div>
	
	<script>
	$(document).ready(function() {


		$('#dataTables-example').DataTable({
			responsive: true

		});
	});

	</script>

</body>
</html>
