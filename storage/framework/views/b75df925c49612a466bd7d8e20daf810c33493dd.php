<?php echo $__env->make('front.css', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<body class="homepage">

	<?php echo $__env->make('front.extra', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


	<!-- Main -->
	<div id="main">
		<div class="container">
			<div class="form-group"><h1 style="font-size:38px;">APPLICATION</h1></div>
			<!-- /.panel-heading -->
						<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-info">
				<?php $__currentLoopData = $model; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modell): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
				<center>
				<table><th colspan="2"><center><h1 style="font-size:20px;"><?php echo e($modell->name); ?></h1></center></th>
				<tr><td colspan="2"><br></td></tr>
				<tr><td>รหัส</td>	<td> : <?php echo e($modell->id); ?></td></tr>
				<tr><td>ภาษาที่ใช้พัฒนา</td><td> : <?php echo e($modell->develop_language); ?></td></tr>
				<tr><td>ฐานข้อมูล</td><td> : <?php echo e($modell->app_database); ?></td></tr>
				<tr><td>บริษัทที่พัฒนา</td><td> : <?php echo e($modell->develop_company); ?></td></tr>
				<tr><td>ปีที่เริ่มใช้งาน</td><td> : <?php echo e($modell->getting_start_years); ?></td></tr>
				<tr><td>แอพพลิเคชั่นที่เกี่ยวข้อง</td><td> : I-payment</td></tr>
				<tr><td>ข้อสังเกต</td><td> : <?php echo e($modell->remark); ?></td></tr>
				<tr><td>ค่าซ่อมบำรุง</td><td> : <?php echo e($modell->ma_cost); ?></td></tr>
				<tr><td>หน่วยงานที่เกี่ยวข้อง</td><td> : <?php echo e($modell->dname); ?></td></tr>
				</table></center>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
								</div>
			</div>
			<!-- /.panel-body -->
			<!-- /.panel -->
		</div>
	</div>
</body>
