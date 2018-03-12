<?php $__env->startSection('page_heading'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
  			<div class="form-group"><h1 style="font-size:38px;">ข้อมูลหลัก</h1></div>
<div class="bs-example" data-example-id="bordered-table">
    <div class="row">
        <div class="col-lg-10">
<div class="panel panel-default" >
    <div class="panel-heading">
        เมนู
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body" style="margin-right:20px;">
        <div class="form-group"><h4 >โปรดเลือกหน้าที่ต้องการ</h4></div>
        <select id="master" name="master" class="form-control info">
            <option selected=\"selected\"></option>
            <option value="b" href="<?php echo e(url ('de')); ?>">หน่วยงานที่เกี่ยวข้อง</option>
            <option value="a" href="<?php echo e(url ('brand')); ?>">ยี่ห้อ</option>
            <option value="d" href="<?php echo e(url ('coll')); ?>">ประเภทการเก็บข้อมูล</option>
            <option value="r" href="<?php echo e(url ('lang')); ?>">ภาษาที่ใช้พัฒนา</option>
            <option value="q" href="<?php echo e(url ('place')); ?>">สถานที่ตั้ง</option>
            <option value="w" href="<?php echo e(url ('proc')); ?>">ประเภทกระบวนการ</option>
            <option value="g" href="<?php echo e(url ('ud')); ?>">ฐานข้อมูลที่ใช้</option>
             <option value="g" href="<?php echo e(url ('state')); ?>">สถานะ</option>
            <option value="" href="<?php echo e(url ('InApp')); ?>">ตัวย่อระบบสารสนเทศและข้อมูล</option>
               <option value="" href="<?php echo e(url ('lv1')); ?>">กระบวนการระดับ 1</option>
                <option value="" href="<?php echo e(url ('lv2')); ?>" >กระบวนการระดับ 2</option>
                <option value="" href="<?php echo e(url ('lv3')); ?>">กระบวนการระดับ 3</option> 
        </select>

    </div>
    <!-- /.panel-body -->
</div>
<!-- /.panel -->

</div>
    </div>
</div>
</div>
<script src="<?php echo e(asset('/assets/bower_components/jquery/dist/jquery.min.js')); ?>"></script>
<script>
    $(document).ready(function() {
        document.getElementById('master').onchange = function() {
            window.location.href = this.children[this.selectedIndex].getAttribute('href');
           // alert('4');
        };
    });

</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>