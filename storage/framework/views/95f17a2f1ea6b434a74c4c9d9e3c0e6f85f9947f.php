<?php echo $__env->make('front.css', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<body class="homepage">

	<?php echo $__env->make('front.extra', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


	<!-- Main -->
	<div id="main">
		<div class="container">
			<div class="form-group"><h1 style="font-size:38px;">BUSSINESS</h1></div>
			<!-- /.panel-heading -->
						<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-info">
				<?php $__currentLoopData = $model; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modell): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
				<center>
				<table><th colspan="2"><center><h1 style="font-size:20px;"><?php echo e($modell->name); ?></h1></center></th>
				<tr><td colspan="2"><br></td></tr>
				<tr><td>รหัส</td>	<td : ><?php echo e($modell->id); ?></td></tr>
				<tr><td>ประเภท</td><td> : กระบวนการนักษึกษา</td></tr>
				<tr><td>ข้อมูลที่เกี่ยวข้อง</td><td> : ข้อมูลนักศึกษา</td></tr>
				<tr><td>หน่วยงานที่เกี่ยวข้อง</td><td> : <?php echo e($modell->dname); ?> </td></tr>
				<tr><td>ระบบที่เกี่ยวข้อง</td><td> : I-regis </td></tr>
				<tr><td>รายละเอียดเพิ่มเติม</td><td> : <?php echo e($modell->remark); ?></td></tr>
				<tr><td colspan="2"><br></td></tr>
				<tr><td colspan="2"><button class="btn btn-success">Download Workflow</button></td></tr>
				</table></center>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
								</div>
			</div>
			<!-- /.panel-body -->
			<!-- /.panel -->
		</div>
	</div>
</body>
