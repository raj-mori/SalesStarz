<?php
$agree = qs("SELECT * FROM agree_term ");
if ($_REQUEST['agree_terms']) {
    qu("agree_term", array('agree_term' => $_REQUEST['terms']), "id=1");
//    header("Refresh:0");
    $agree = qs("SELECT * FROM agree_term ");
    die;
}
?>
<div class="addAffiliates actionItem">
    <div class="panel panel-default">
        <div class="panel-heading">Agree Terms</div> 
        <div class="panel-body">
            <form method="post" action="" class="form-horizontal" role="form">
                <div class="form-group">
                    <label for="inputquestion" class="col-lg-2 control-label">Agree Terms</label>
                    <div class="col-lg-5">
                        <textarea type="text" class="form-control "  name="terms" id="terms" placeholder="Agree Terms" value="" required><?php print $agree['agree_term'] ?></textarea>
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
            url: _U + 'agree_terms',
            type: "post",
            data: {agree_terms: 1, terms: $("#terms").val()},
            success: function(r) {
          
                if (r == 1) {

                    $("#success").html('Edited Successfully!');
                }
            }
        });
    }
</script>

