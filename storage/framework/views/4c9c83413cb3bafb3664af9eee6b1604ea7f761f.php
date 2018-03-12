<tr>
    <td>1 </td>
    <td>2</td>
    <td>
        <button type="button" class="btn btn-danger" "">Delete</button>
    </td>
</tr>

<script src="<?php echo e(asset('/assets/bower_components/jquery/dist/jquery.min.js')); ?>"></script>
<script>
    $(document).ready(function() {
        ReqData();


        alert('1');

        function ReqData() {
            $.post('content', {
            }, function (data) {
                $('#content').html(data);
            });
        }
    });


</script>
