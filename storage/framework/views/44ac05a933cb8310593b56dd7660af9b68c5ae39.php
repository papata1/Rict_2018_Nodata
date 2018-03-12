
<style>
	.ice{background-color: #DBDBDB;}
	.active{background-color: #CECECE;}
  .dropdown-menu{background-color: #DBDBDB; color: #428bca;}
  .nav>li>a:hover, .nav>li>a:focus {
    background-color: #B0CACE;
  }
  .btn-custom:hover, .btn-custom:focus, .btn-custom:active, .btn-custom.active, .open>.dropdown-toggle.btn-custom {
    background-color: #B0CACE;
    border-color: white;
  }
  .btn-custom {
    background-color: white;
    border-color: white;
  }
  .cusbtn {
    display: inline-block;
    padding: 3px 8px;
    margin-bottom: 0;
    font-size: 20px;
    font-weight: 400;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 7px;
  }
</style>
<link rel="shortcut icon" href="<?php echo e(URL::asset('images/favicon.ico')); ?>" />
<!-- Brand and toggle get grouped for better mobile display -->
<div class="panel panel-default ice">
  <div class="panel-body ">

    <!-- Brand and toggle get grouped for better mobile display -->


    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="<?php echo url(''); ?>" style="padding: 0px 0px;"><?php echo Html::image('images\logo.png'); ?></a>
       </li>
       <li class="dropdown cusbtn btn-custom
       <?php echo e(Request::is('/') ? 'active' : ''); ?> 
       <?php echo e(Request::is('main/Bus') ? 'active' : ''); ?> 
       <?php echo e(Request::is('Bustype/*') ? 'active' : ''); ?>

       <?php echo e(Request::is('main/BusDetail/*') ? 'active' : ''); ?>

       ">
       <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">กระบวนการ<span class="caret"></span></a>
       <ul class="dropdown-menu">
        <li class="dropdown <?php echo e(Request::is('main/Bus') ? 'active' : ''); ?> "><a href="<?php echo url('main/Bus'); ?>">กระบวนการทั้งหมด</a></li>
        <li role="separator" class="divider"></li>
        <?php if(isset($lv1)): ?>
        <?php $__currentLoopData = $lv1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <li class="dropdown <?php echo e(Request::is('Bustype/".$row->id."') ? 'active' : ''); ?>"><a href="<?php echo url('Bustype/'.$row->id); ?>"><?php echo e($row->name); ?></a></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        <?php endif; ?>
        <li role="separator" class="divider"></li>
        <li class="dropdown <?php echo e(Request::is('Bustype/excel') ? 'active' : ''); ?>"><a href="<?php echo url('Bustype/excel'); ?>">Download Excel</a></li>

        </ul>
    </li><li>&nbsp;&nbsp;</li>
    <li class=" cusbtn btn-custom
    <?php echo e(Request::is('main/App') ? 'active' : ''); ?>

    <?php echo e(Request::is('main/AppDetail/*') ? 'active' : ''); ?>

    "><a href="<?php echo url('main/App'); ?>">ระบบสารสนเทศ<span class="sr-only">(current)</span></a></li><li>&nbsp;&nbsp;</li>
    <li class="dropdown cusbtn btn-custom
    <?php echo e(Request::is('main/Dat') ? 'active' : ''); ?>

    <?php echo e(Request::is('Dattype/*') ? 'active' : ''); ?>

    <?php echo e(Request::is('main/DatDetail/*') ? 'active' : ''); ?>

    "><a href="<?php echo url('main/Dat'); ?>">ข้อมูล<span class="sr-only">(current)</span></a></li><li>&nbsp;&nbsp;</li>
  
  </li><li>&nbsp;&nbsp;</li>
  <li class="dropdown cusbtn btn-custom
  <?php echo e(Request::is('main/Tec') ? 'active' : ''); ?>

  <?php echo e(Request::is('Tectype/*') ? 'active' : ''); ?>

  <?php echo e(Request::is('main/TecDetail/*') ? 'active' : ''); ?>

  ">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">เทคโนโลยี<span class="caret"></span></a>
  <ul class="dropdown-menu">
    <li class="dropdown <?php echo e(Request::is('main/Tec') ? 'active' : ''); ?>"><a href="<?php echo url('main/Tec'); ?>">เทคโนโลยีทั้งหมด</a></li>
    <li role="separator" class="divider"></li>
    <li class="dropdown <?php echo e(Request::is('Tectype/1') ? 'active' : ''); ?>"><a href="<?php echo url('Tectype/1'); ?>">เครื่องแม่ข่าย</a></li>
    <li class="dropdown <?php echo e(Request::is('Tectype//') ? 'active' : ''); ?>"><a href="<?php echo url('Tectype/2'); ?>">อุปกรณ์</a></li>
  </ul>
</li><li>&nbsp;&nbsp;</li>
<li class="dropdown cusbtn btn-custom
<?php echo e(Request::is('menurelation') ? 'active' : ''); ?>

"><a href="<?php echo url('menurelation'); ?>">ตารางแสดงความสัมพันธ์</a></li>
</ul>
</div><!-- /.navbar-collapse -->


</div>
</div>
