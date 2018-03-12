<?php $__env->startSection('page_heading','Update'); ?>
<?php $__env->startSection('content'); ?>

<div class="container">
       <div class="row">
           <div class="col-md-7 col-md-offset-1">.

               <div class="panel panel-default">
                 <?php if($tech->type === '2'): ?>
                 <div class="panel-heading">อุปกรณ์</div>

                 <div class="panel-body">

                    <?php echo Form::model($tech,array('route'=>['tech.update',$tech->id],'method'=>'PUT','novalidate' => 'novalidate','files' => true)); ?>



                 <div class="form-group">
                   <?php echo Form::label('name','ชื่อ'); ?>

                   <?php echo Form::text('name',null,['class'=>'form-control']); ?>

                 </div>
                 <div class="form-group">
                   <?php echo Form::label('model','รุ่น'); ?>

                   <?php echo Form::text('model',null,['class'=>'form-control']); ?>

                 </div>
                 <div class="form-group">
                   <?php echo Form::label('tech_spec','สเปค'); ?>

                   <?php echo Form::text('tech_spec',null,['class'=>'form-control']); ?>

                 </div>
                 <div class="form-group">
                   <?php echo Form::label('amount','จำนวน'); ?>

                   <?php echo Form::text('amount',null,['class'=>'form-control']); ?>

                 </div>
                   <div class="form-group">
                   <?php echo Form::label('ma_cost',' ค่าซ่อมบำรุง'); ?>

                   <input type="text" id="ma_cost" name="ma_cost" size="10" value="<?php echo e($tech->ma_cost); ?>"> บาท/ต่อปี
                 </div>
                     <div class="form-group">
                         <?php echo Form::label('tech_location',' สถานที่ตั้ง'); ?>

                         <?php echo Form::select('tech_location',[''=>''] + $tt, null, ['class' => 'form-control datar']); ?>

                     </div>
                     <div class="form-group">
                         <?php echo Form::label('brand','ยี่ห้อ'); ?>

                         <?php echo Form::select('brand', [''=>''] + $dd, null, ['class' => 'form-control datar']); ?>

                     </div>
                  <div class="form-group">
                   <?php echo Form::label('remark',' รายละเอียด'); ?>

                   <?php echo Form::textarea('remark',null,['class'=>'form-control']); ?>

                 </div>
                 <div class="form-group">
                   <?php if($tech->file): ?>
                   <?php echo Form::label('file','Specification'); ?>

                         <p> <img src="<?php echo e(URL::to('/')); ?>/images/tech/<?php echo e($tech->file); ?>"  width="600" height="600" /> </p>
                  <?php echo Form::file('file',null,['class'=>'form-control']); ?>

                   <?php else: ?>
                                        <p>No Specification </p>
                   <?php echo Form::label('file','Specification'); ?><br >
                   <?php echo Form::file('file',null,['class'=>'form-control']); ?>

                   <?php echo Form::hidden('type','2',['class'=>'form-control']); ?>

                   <?php endif; ?>

                 </div>

                 <?php else: ?>
                   <div class="panel-heading">เครื่องแม่ข่าย</div>

                   <div class="panel-body">


                     <?php echo Form::model($tech,array('route'=>['tech.update',$tech->id],'method'=>'PUT','novalidate' => 'novalidate','files' => true)); ?>



                       <div class="form-group">
                        <?php echo Form::label('name','ชื่อ'); ?>

                        <?php echo Form::text('name',null,['class'=>'form-control']); ?>

                      </div>
                      <div class="form-group">
                        <?php echo Form::label('model','รุ่น'); ?>

                        <?php echo Form::text('model',null,['class'=>'form-control']); ?>

                      </div>
                      <div class="form-group">
                        <?php echo Form::label('tech_spec','สเปค'); ?>

                        <?php echo Form::text('tech_spec',null,['class'=>'form-control']); ?>

                      </div>
                      <div class="form-group">
                        <?php echo Form::label('amount','จำนวน'); ?>

                        <?php echo Form::text('amount',null,['class'=>'form-control']); ?>

                      </div>
                      <div class="form-group">
                        <?php echo Form::label('operating_system','ระบบปฏิบัติการ'); ?>

                        <?php echo Form::text('operating_system',null,['class'=>'form-control']); ?>

                      </div>
                      <div class="form-group">
                        <?php echo Form::label('cpu_use','ซีพียูที่ใช้'); ?>

                        <?php echo Form::text('cpu_use',null,['class'=>'form-control']); ?>

                      </div>
                      <div class="form-group">
                        <?php echo Form::label('memory_total',' เมมโมรี่ทั้งหมด'); ?>

                          <input type="text" id="memory_total" name="memory_total" size="10"> GB
                      </div>
                      <div class="form-group">
                        <?php echo Form::label('memory_used','เมมโมรี่ที่ใช้'); ?>

                          <input type="text" id="memory_used" name="memory_used" value="<?php echo e($tech->memory_used); ?>size="10"> GB
                      </div>
                        <div class="form-group">
                        <?php echo Form::label('hardisk_total','หน่วนความจำที่มี'); ?>

                            <input type="text" id="hardisk_total" name="hardisk_total" value="<?php echo e($tech->hardisk_total); ?>size="10"> GB
                        </div>
                        <div class="form-group">
                        <?php echo Form::label(' hardisk_used',' หน่วนความจำที่ใช้'); ?>

                            <input type="text" id="hardisk_used" name="hardisk_used" value="<?php echo e($tech->hardisk_used); ?>size="10"> GB
                      </div>
                        <div class="form-group">
                        <?php echo Form::label('ma_cost',' ค่าซ่อมบำรุง'); ?>

                         <input type="text" id="ma_cost" name="ma_cost"size="10" value="<?php echo e($tech->ma_cost); ?>" > บาท/ต่อปี
                      </div>
                       <div class="form-group">
                           <?php echo Form::label('tech_location',' สถานที่ตั้ง'); ?>

                           <?php echo Form::select('tech_location',[''=>''] + $tt, null, ['class' => 'form-control datar']); ?>

                       </div>
                       <div class="form-group">
                           <?php echo Form::label('brand','ยี่ห้อ'); ?>

                           <?php echo Form::select('brand', [''=>''] + $dd, null, ['class' => 'form-control datar']); ?>

                       </div>
                       <div class="form-group">
                        <?php echo Form::label('remark',' รายละเอียด'); ?>

                        <?php echo Form::textarea('remark',null,['class'=>'form-control']); ?>

                      </div>
                      <div class="form-group">
                       <?php if($tech->file): ?>
                       <?php echo Form::label('file','Specification'); ?>

                           <p><a href="<?php echo e(action('TechController@download' ,[$tech->file])); ?>"><?php echo e($tech->file); ?></a></p>
                              <?php echo Form::file('file',null,['class'=>'form-control']); ?><p></p>
                       <?php else: ?>
                                            <p>No Specification </p>
                       <?php echo Form::label('file','Specification'); ?><br >
                       <?php echo Form::file('file',null,['class'=>'form-control']); ?>

                       <?php echo Form::hidden('type','1'); ?><p></p>
                      </div>
                       <?php endif; ?>
                       <?php echo Form::label('','ระบบสารสนเทศ'); ?>

                       <div class="panel panel-default" >
                           <div class="panel-heading">
                               ระบบสารสนเทศ
                           </div>
                           <div class="panel-body" style="margin-right:20px;">
                               <table width="100%" class="table">
                                   <thead>
                                   <tr>
                                       <td>ชื่อ</td>
                                       <td>ลบ</td>
                                   </tr>
                                   </thead>
                                   <tbody>
                                   <?php $__currentLoopData = $aps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                       <tr>
                                           <td><?php echo e($a->name); ?>  </td>
                                           <td>
                                               <a href="<?php echo e(action('TechController@dep' ,[$tech,$a->id] )); ?>" class="btn btn-danger delre"><span class="glyphicon glyphicon-remove"></span></a>                                           </td>
                                           </td>
                                       </tr>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                   </tbody>
                               </table>
                           </div>
                       </div>
                       <div class="form-group">
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
                                   <div class="app"><table class="table"></table></div>
                               </div>
                               <!-- /.panel-body -->
                           </div>
                           <!-- /.panel -->
                       </div>
                          <?php endif; ?>

                       <?php echo Form::hidden('app2', null,['id' => 'app2']); ?>

                       <?php echo Form::hidden('bus2', null,['id' => 'bus2']); ?>

                       <?php echo Form::hidden('tech2', null,['id' => 'tech2']); ?>

                      <div class="form-group">
                        <?php echo Form::button('บันทึก',['type'=>'submit','class'=>'btn btn-primary','id'=>'add1']); ?>

                          <?php echo e(link_to_route('tech.index','ย้อนกลับ',null,['class'=>'btn btn-danger'])); ?>

                      </div>
                                <?php echo Form::close(); ?>




                   </div>
               </div>
               <?php if($errors->any()): ?>
              <ul class="alert alert-danger">
              <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
              <li><?php echo e($error); ?></li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
              </ul>
              <?php endif; ?>
           </div>
       </div>
   </div>
        </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            var valuebus = new Array();
            var valuebus1 = new Array();
            var valuetech = new Array();
            var valuetech1 = new Array();
            var valueapp = new Array();
            var valueapp1 = new Array();
            var i5 = 0;
            var i7 = 0;
            var i8 = 0;

            $('#app').change(function () {
                // alert("aa");
                var aom = 0 ;
                var app = document.getElementById("app");
                var selectedTextapp1 = app.options[app.selectedIndex].text;
                var selectedTextapp = app.options[app.selectedIndex].value;
                for (i = 0; i < valueapp.length; i++) {
                    if (valueapp[i] == selectedTextapp ) {
                        var aom = '1';
                    }
                }
                if (aom == '1' ){}else {
                    valueapp[i5] =  selectedTextapp ;
                    valueapp1[i5] =  selectedTextapp1 ;
                    $('.app table').append("<tr><td>" + valueapp1[i5] + "</td><td><button type='button'' class='btn btn-danger arraydel1' data-id='" + valueapp1[i5] + "'" +
                            " data-id1='" + valueapp[i5] + "' ><span class='glyphicon glyphicon-remove'></span></button></td></tr><br>");
                    i5++;
                    $('.app').on('click', '.arraydel1', function () {
                        var data = $(this).attr('data-id');
                        var data1 = $(this).attr('data-id1');
                        //alert(data1);
                        valueapp1 = jQuery.grep(valueapp1, function (value) {
                            return value != data;
                        });
                        valueapp = jQuery.grep(valueapp, function (value) {
                            return value != data1;
                        });
                        $(this).closest('tr').remove();

                    });
                }

            });
            $('#bus').change(function () {
                var aom = 0 ;
                var bus = document.getElementById("bus");
                var selectedTextbus1 = bus.options[bus.selectedIndex].text;
                var selectedTextbus = bus.options[bus.selectedIndex].value;
                for (i = 0; i < valuebus.length; i++) {
                    if (valuebus[i] == selectedTextbus ) {
                        var aom = '1';
                    }
                }
                if (aom == '1' ){}else {
                    valuebus[i7] =  selectedTextbus ;
                    valuebus1[i7] =  selectedTextbus1 ;
                    $('.bus table').append("<tr><td>" + valuebus1[i7] + "</td><td><button type='button' class='btn btn-danger arraydel1' data-id='" + valuebus1[i7] + "'" +
                            " data-id1='" + valuebus[i7] + "' ><span class='glyphicon glyphicon-remove'></span></button></td></tr><br>");
                    i7++;
                    $('.bus').on('click', '.arraydel1', function () {
                        var data = $(this).attr('data-id');
                        var data1 = $(this).attr('data-id1');
                        valuebus1 = jQuery.grep(valuebus1, function (value) {
                            return value != data;
                        });
                        valuebus = jQuery.grep(valuebus, function (value) {
                            return value != data1;
                        });
                        $(this).closest('tr').remove();

                    });
                }

            });
            $('#tech').change(function () {
                //alert("aa");
                var aom = 0 ;
                var tech = document.getElementById("tech");
                var selectedTexttech1 = tech.options[tech.selectedIndex].text;
                var selectedTexttech = tech.options[tech.selectedIndex].value;
                for (i = 0; i < valuetech.length; i++) {
                    if (valuetech[i] == selectedTexttech ) {
                        var aom = '1';
                    }
                }
                if (aom == '1' ){}else {
                    valuetech[i8] =  selectedTexttech ;
                    valuetech1[i8] =  selectedTexttech1 ;
                    $('.tech table').append("<tr><td>" + valuetech1[i8] + "</td><td><button type='button' class='btn btn-danger arraydel2' data-id='" + valuetech1[i8] + "'" +
                            " data-id1='" + valuetech[i8] + "' ><span class='glyphicon glyphicon-remove'></span></button></td></tr><br>");
                    i8++;
                    $('.tech').on('click', '.arraydel2', function () {
                        var data = $(this).attr('data-id');
                        var data1 = $(this).attr('data-id1');
                        //alert(data1);
                        valuetech1 = jQuery.grep(valuetech1, function (value) {
                            return value != data;
                        });
                        valuetech = jQuery.grep(valuetech, function (value) {
                            return value != data1;
                        });
                        $(this).closest('tr').remove();

                    });
                }

            });
            $('#add1').click(function () {
                $('#app2').val(JSON.stringify(valueapp));
                $('#bus2').val(JSON.stringify(valuebus));
                $('#tech2').val(JSON.stringify(valuetech));
                //alert(valuedata);
            });

        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>