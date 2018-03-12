<?php $__env->startSection('page_heading'); ?>
<?php $__env->startSection('content'); ?>
<!--Modal add -->
<div class="modal fade" id="Add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
     xmlns="http://www.w3.org/1999/html">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Show</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label for="name">id</label>
                            <input type="text" class="form-control txt1" name="name1" id="t0">
                            <label for="lname">name</label>
                            <input type="text" class="form-control txt1" name="lname1" id="t1">
                            <label for="divi">develop_language</label>
                            <input type="text" class="form-control txt1" name="divi1" id="t2">
                            <label for="email">app_database</label>
                            <input type="text" class="form-control txt1" name="email1" id="t3">
                            <label for="tel">develop_company</label>
                            <input type="text" class="form-control txt1" name="tel1" id="t4">
                            <label for="addre">getting_start_years</label>
                            <input type="text" class="form-control txt1" name="addre1" id="t5">
                            <label for="addre">app_relation</label>
                            <input type="text" class="form-control txt1" name="addre1" id="t6">
                            <label for="addre">remark</label>
                            <input type="text" class="form-control txt1" name="addre1" id="t7">
                            <label for="addre">ma_cost</label>
                            <input type="text" class="form-control txt1" name="addre1" id="t8">
                            <label for="addre">department_id</label>
                            <input type="text" class="form-control txt1" name="addre1" id="t9">
                        </div>
                    </div>
                    <div class="col-sm-2"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>

            </div>
        </div>
    </div>
</div>
<div class="container">
  			<div class="form-group"><h1 style="font-size:38px;">Add Relation</h1></div>


    <div class="row">
        <form action="addrelation" method = "post" >
            <div class="dropdown">
            <select  id="SpaceAccommodation" name="YogaSpaceAccommodation" class="btn btn-primary dropdown-toggle">
                <option selected="selected" class="dropdown-menu">Application</option>
                <?php $__currentLoopData = $apps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ap): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <option><?php echo e($ap->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

            </select></div><br>
            <div class="bs-example" data-example-id="bordered-table">
                <div class="panel panel-default" >
                    <div class="panel-heading">
                        Add Relation Tables
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body" style="margin-right:20px;">
                        <div class="test"></div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <input type="hidden" id="id" name="id" value="<?php echo e($app); ?>" >
            <input type="hidden" id="str" name="str" value="" >
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" >
            <input type="submit" value="submit" id = "add1" >
            <br>
        </form>
    </div>


</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        ReqData();
        var a=0;
        var i = 0;
        var value = new Array();

        function ReqData(){
            $.post('content.php',{
            },function(data){
                alert(data);
               $('#content').html(data);
            });
        }
        $('#SpaceAccommodation').change(function () {

            var selectedText = $(this).find("option:selected").text();
            value[i] =  selectedText ;

            $(".test").text(value);

            i++;

        });
        $('#add1').click(function () {
            $('#str').val(JSON.stringify(value));
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