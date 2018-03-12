<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li <?php echo e((Request::is('/bus') ? 'class="active"' : '')); ?>>
            <a href="<?php echo e(url ('/user')); ?>"><i class="fa fa-dashboard fa-fw"></i>account</a>
            </li>
            <li >
                <a href="#"><i class="fa fa-wrench fa-fw"></i> EA Elements<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li <?php echo e((Request::is('*panels') ? 'class="active"' : '')); ?>>
                    <a href="<?php echo e(url ('bus')); ?>">Business</a>
                    </li>
                    <li <?php echo e((Request::is('*buttons') ? 'class="active"' : '')); ?>>
                    <a href="<?php echo e(url ('app' )); ?>">Application</a>
                    </li>
                    <li <?php echo e((Request::is('*notifications') ? 'class="active"' : '')); ?>>
                    <a href="<?php echo e(url('dat')); ?>">Data</a>
                    </li>
                    <li <?php echo e((Request::is('*typography') ? 'class="active"' : '')); ?>>
                    <a href="<?php echo e(url ('tech')); ?>">Technology</a>
                    </li>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>





        </ul>
    </div>