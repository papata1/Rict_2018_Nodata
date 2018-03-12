<?php echo $__env->make('front.css', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<body class="homepage">

	<?php echo $__env->make('front.extra', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


	<!-- Main -->
	<div id="main">
		<div class="container">
			<div class="form-group"><h1 style="font-size:38px;">TECHNOLOGY</h1></div>
			<!-- /.panel-heading -->
						<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-info">
				<?php $__currentLoopData = $model; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modell): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
				<center>
				<table><th colspan="2"><center><h1 style="font-size:20px;"> : <?php echo e($modell->name); ?></h1></center></th>
				<tr><td colspan="2"><br></td></tr>
				<tr><td>รหัส</td><td> : <?php echo e($modell->id); ?></td></tr>
				<tr><td>ชื่อ</td><td> : <?php echo e($modell->name); ?></td></tr>
				<tr><td>ยี่ห้อ</td><td> : <?php echo e($modell->brand); ?></td></tr>
				<tr><td>รุ่น</td><td> : <?php echo e($modell->model); ?></td></tr>
				<tr><td>สเปค</td><td> : <?php echo e($modell->tech_spec); ?></td></tr>
				<tr><td>จำนวน</td><td> : <?php echo e($modell->amount); ?></td></tr>
				<tr><td>ระบบประฏิบัติการ</td><td> : <?php echo e($modell->operating_system); ?></td></tr>
				<tr><td>ซีพียูที่ใช้</td><td> : <?php echo e($modell->cpu_use); ?></td></tr>
				<tr><td>เมโมรี่ที่มี</td><td> : <?php echo e($modell->memory_total); ?></td></tr>
				<tr><td>เมโมรี่ที่ใช้</td><td> : <?php echo e($modell->memory_used); ?></td></tr>
				<tr><td>หน่วยความจำที่มี</td><td> : <?php echo e($modell->hardisk_total); ?></td></tr>
				<tr><td>หน่วยความจำที่ใช้</td><td> : <?php echo e($modell->hardisk_used); ?></td></tr>
				<tr><td>แอพพลิเคชั่นที่มี</td><td> : <?php echo e($modell->utility_app); ?></td></tr>
				<tr><td>สถานที่ตั้ง</td><td> : <?php echo e($modell->tech_location); ?></td></tr>
				<tr><td>ค่าซ่อมบำรุง</td><td> : <?php echo e($modell->ma_cost); ?></td></tr>
				<tr><td>ข้อเสนอแนะ</td><td> : <?php echo e($modell->remark); ?></td></tr>
				</table></center>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
								</div>
			</div>
			<!-- /.panel-body -->
			<!-- /.panel -->
		</div>
	</div>
</body>
