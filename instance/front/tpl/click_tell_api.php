<?php
$click = qs("SELECT * FROM click_tell ");
if ($_REQUEST['click_tell_api']) {
    qu("click_tell", array('user' => $_REQUEST['user'], 'password' => $_REQUEST['password'], 'api_id' => $_REQUEST['api_id'], 'base_url' => $_REQUEST['base_url']), "id=1");
//    header("Refresh:0");
    $click = qs("SELECT * FROM click_tell ");
}
?>
<div class="addAffiliates actionItem">
    <div class="panel panel-default">
        <div class="panel-heading">Click A Tell</div> 
        <div class="panel-body">
            <form method="post" action="" class="form-horizontal" role="form">
                <div class="form-group">
                    <label for="inputquestion" class="col-lg-2 control-label">User</label>
                    <div class="col-lg-5">
                        <input type="text" class="form-control" name="user" id="user" value="<?php print $click['user']; ?>" placeholder="Publish Key" required>

                    </div>
                </div>
                <div class="form-group">
                    <label for="inputquestion" class="col-lg-2 control-label">Password</label>
                    <div class="col-lg-5">
                        <input type="text" class="form-control" name="password" id="password" value="<?php print $click['password']; ?>" placeholder="Publish Key" required>

                    </div>
                </div><div class="form-group">
                    <label for="inputquestion" class="col-lg-2 control-label">Api Id</label>
                    <div class="col-lg-5">
                        <input type="text" class="form-control" name="api_id" id="api_id" value="<?php print $click['api_id']; ?>" placeholder="Publish Key" required>

                    </div>
                </div><div class="form-group">
                    <label for="inputquestion" class="col-lg-2 control-label">Base Url</label>
                    <div class="col-lg-5">
                        <input type="text" class="form-control" name="base_url" id="base_url" value="<?php print $click['base_url']; ?>" placeholder="Publish Key" required>

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
            url: _U + 'click_tell_api',
            type: "post",
            data: {click_tell_api: 1, user: $("#user").val(), password: $("#password").val(), api_id: $("#api_id").val(), base_url: $("#base_url").val()},
            success: function(r) {
            
                if (r == 1) {

                    $("#success").html('Edited Successfully!');
                }
            }
        });
    }
</script>

