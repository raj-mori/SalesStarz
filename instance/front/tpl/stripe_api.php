<?php
$stripe = qs("SELECT * FROM stripe_api ");
if ($_REQUEST['stripe_api']) {
   $data= qu("stripe_api", array('secret_key' => $_REQUEST['secret'], 'publish_key' => $_REQUEST['publish']), "id=1");
//    header("Refresh:0");
    $stripe = qs("SELECT * FROM stripe_api ");
   
    die;
}
?>
<div class="addAffiliates actionItem">
    <div class="panel panel-default">
        <div class="panel-heading">Stripe Api</div> 
        <div class="panel-body">
            <form method="post" action="" class="form-horizontal" role="form">
                <div class="form-group">
                    <label for="inputquestion" class="col-lg-2 control-label">Secret Key</label>
                    <div class="col-lg-5">
                        <input type="text" class="form-control" name="secret" id="secret" value="<?php print $stripe['secret_key']; ?>" placeholder="Secret Key" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputquestion" class="col-lg-2 control-label">Publish Key</label>
                    <div class="col-lg-5">
                        <input type="text" class="form-control" name="publish" id="publish" value="<?php print $stripe['publish_key']; ?>" placeholder="Publish Key" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">

                        <button type="button" onclick="showmodal()" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

</div>
<div class="modal fade" id="callModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body" id="div1">
                <div class="alert alert-success" id="success" >
                </div>


                </br>
                <div style="text-align:right;">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>


                </div>
            </div>
            <div class="modal-body" id="div2">
                <div class="alert alert-danger" id="error" >
                </div>


                </br>
                <div style="text-align:right;">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>


                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="sureModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="alert alert-error" style="">
                    Are you sure you want to take this action ?
                </div>
                </br>
                <div style="text-align:right;">
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-primary" onclick="editdata()">Yes</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

    function showmodal()
    {


        $("#sureModal").modal("show");
    }
    function editdata()
    {

        $("#sureModal").modal("hide");
        $.ajax({
            url: _U + 'stripe_api',
            type: "post",
            data: {stripe_api: 1, secret: $("#secret").val(), publish: $("#publish").val()},
            success: function(r) {
            
                if (r == 1) {

                    $("#success").html('Edited Successfully!');
                }
            }
        });
    }
</script>

