<?php $__env->startSection('page_heading'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="form-group"><h1 style="font-size:38px;">กระบวนการ </h1></div>
  			<div class="form-group"><h1 style="font-size:38px;">เพิ่มความสัมพันธ์</h1></div>
    <div class="row">
        <div class="col-md-7"></div><div class="form-group"><button id="reset"  class="btn btn-danger">Reset</button></div>
        <form action="addrelation" method = "post" >
         <div class="col-md-8">
             <p class="form-group">ระบบสารสนเทศ</p>
             <div class="dropdown">
            <select  id="app" name="appRelation" class="appr">
                <option value=""></option>
                <?php
                $len = sizeof($aq1);
                ?>
                <?php if(count($aq1)): ?>
                <?php $__currentLoopData = $apps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ap): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <?php $sta = 0; ?>
                      <?php $re = 0; ?>
                         <?php $__currentLoopData = $aq1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aq): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                             <?php $re++; ?>
                             <?php if($ap->id != $aq->comp_id): ?>
                                <?php   $sta++; ?>
                                <?php if($re == $len): ?>
                                    <?php if($sta == $len): ?>
                                         <option value="<?php echo e($ap->id); ?>"><?php echo e($ap->name); ?></option>
                                    <?php endif; ?>
                                <?php endif; ?>
                           <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                <?php else: ?>
                <?php $__currentLoopData = $apps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ap): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <option value="<?php echo e($ap->id); ?>"><?php echo e($ap->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                <?php endif; ?>
            </select></div><br>
            <div class="bs-example" data-example-id="bordered-table">
                <div class="panel panel-default" >
                    <div class="panel-heading">
                        เพิ่มความสัมพันธ์ระบบสารสนเทศ
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body" style="margin-right:20px;">
                        <div class="app"></div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            </div>

            <div class="col-md-8">
                <p class="form-group">ข้อมูล</p>
                <div class="dropdown">
            <select  id="data" name="busRelation" class="datar">
                <option value=""></option>
                <?php
                $lend = sizeof($dq1);
                ?>
                <?php if(count($dq1)): ?>
                <?php $__currentLoopData = $dats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ds): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <?php $sta = 0; ?>
                <?php $re = 0; ?>
                <?php $__currentLoopData = $dq1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dq): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <?php $re++; ?>
                <?php if($ds->id != $dq->comp_id): ?>
                <?php   $sta++; ?>
                <?php if($re == $lend): ?>
                <?php if($sta == $lend): ?>
                <option value="<?php echo e($ds->id); ?>"><?php echo e($ds->name); ?></option>
                <?php endif; ?>
                <?php endif; ?>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                <?php else: ?>
                <?php $__currentLoopData = $dats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ds): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <option value="<?php echo e($ds->id); ?>"><?php echo e($ds->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                <?php endif; ?>


            </select></div><br>
            <div class="bs-example" data-example-id="bordered-table">
                <div class="panel panel-default" >
                    <div class="panel-heading">
                        เพิ่มความสัมพันธ์ข้อมูล
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body" style="margin-right:20px;">
                        <div class="data"></div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            </div>

            <input type="hidden" id="id" name="id" value="<?php echo e($app); ?>" >
            <input type="hidden" id="ar" name="ar" value="" >
            <input type="hidden" id="dr" name="dr" value="" >


            <input type="hidden" id="tpr" name="tpr" value="" >
            <input type="hidden" id="der" name="der" value="" >

            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" >
            <div class="col-md-6">
            <input type="submit" value="ตกลง" id = "add1"  class=" btn btn-success" >
            </div>
            <br>
    </form>

    </div>
</div>

 <br>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        var a=0;
        var i = 0;
        var i1 = 0;
        var i2 = 0;
        var i3 = 0;

        var i5 = 0;
        var i6 = 0;

        var value = new Array();
        var value1 = new Array();
        var valueb = new Array();
        var valueb1 = new Array();
        var valued = new Array();
        var valued1 = new Array();
        var valuet = new Array();
        var valuet1 = new Array();

        var valuetp = new Array();
        var valuetp1 = new Array();
        var valuede = new Array();
        var valuede1 = new Array();

         $('#reset').click(function () {
           // alert("aa")
            location.reload();
            false;
        });
        $('#tp').change(function () {
            var tpq = document.getElementById("tp");
            var selectedTexttp1 = tpq.options[tpq.selectedIndex].text;
            var selectedTexttp = tpq.options[tpq.selectedIndex].value;
            //    var selectedText = $(this).find("option:selected").value();
            valuetp[i5] =  selectedTexttp ;
            valuetp1[i5] =  selectedTexttp1 ;

            $(".tp").text(valuetp1);

            i5++;

        });
        $('#de').change(function () {
            var deq = document.getElementById("de");
            var selectedTextde1 = deq.options[deq.selectedIndex].text;
            var selectedTextde = deq.options[deq.selectedIndex].value;
            //    var selectedText = $(this).find("option:selected").value();
            valuede[i6] =  selectedTextde ;
            valuede1[i6] =  selectedTextde1 ;

            $(".de").text(valuede1);

            i6++;

        });

        $('#app').change(function () {
          var e = document.getElementById("app");
          var selectedText1 = e.options[e.selectedIndex].text;
          var selectedText = e.options[e.selectedIndex].value;
        //    var selectedText = $(this).find("option:selected").value();
            value[i] =  selectedText ;
            value1[i] =  selectedText1 ;

            $(".app").text(value1);

            i++;

        });
        $('#bus').change(function () {
          var b = document.getElementById("bus");
          var selectedTextb1 = b.options[b.selectedIndex].text;
          var selectedTextb = b.options[b.selectedIndex].value;
        //    var selectedText = $(this).find("option:selected").value();
            valueb[i1] =  selectedTextb ;
            valueb1[i1] =  selectedTextb1 ;

            $(".bus").text(valueb1);

            i1++;

        });
        $('#data').change(function () {
          var d = document.getElementById("data");
          var selectedTextd1 = d.options[d.selectedIndex].text;
          var selectedTextd = d.options[d.selectedIndex].value;
        //    var selectedText = $(this).find("option:selected").value();
            valued[i2] =  selectedTextd ;
            valued1[i2] =  selectedTextd1 ;

            $(".data").text(valued1);

            i2++;

        });

        $('#tech').change(function () {
          var t = document.getElementById("tech");
          var selectedTextt1 = t.options[t.selectedIndex].text;
          var selectedTextt = t.options[t.selectedIndex].value;
        //    var selectedText = $(this).find("option:selected").value();
            valuet[i3] =  selectedTextt ;
            valuet1[i3] =  selectedTextt1 ;

            $(".tech").text(valuet1);

            i3++;

        });
        $('#add1').click(function () {
            $('#ar').val(JSON.stringify(value));
          //  $('#br').val(JSON.stringify(valueb));
            $('#dr').val(JSON.stringify(valued));
           // $('#tr').val(JSON.stringify(valuet));

            $('#tpr').val(JSON.stringify(valuetp));
            $('#der').val(JSON.stringify(valuede));

            /*  var text = "";
              var len = value.length;

              for (i = 0; i < len; i++) {
                  text += "<td>" + value[i] + "</td>";
              }
              document.getElementById("content").innerHTML = text;*/
        });


    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>