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
<div class="addAffiliates actionItem">
    <div class="panel panel-default">
        <div class="panel-heading">Send Text</div>
        <div class="panel-body">
            <form method="post" action="" class="form-horizontal" role="form" >
                <div class="form-group">
                    <label  class="col-lg-2 control-label">Enter Your Number </label>
                    <div class="col-lg-1">
                        <input type="text" class="form-control" name="country_code" id="country_code"  placeholder="Code" required>

                    </div>
                    <div class="col-lg-2">
                        <input type="text" class="form-control" name="number" id="number"  placeholder="Number" required>

                    </div>
                    <div class="clearfix">
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-lg-2 control-label">Message Text</label>
                    <div class="col-lg-3">
                        <input type="text" class="form-control" name="text" id="text" required/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <button type="button" class="btn btn-primary" onclick="send()">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    function send()
    {

        $("#callModal").modal("show");
        $("#div2").hide();
        $('#div1').show();
        $("#success").html('<img src="<?php print _MEDIA_URL ?>img/ajax-loader.gif" />  Connecting!.....');
        $.ajax({
            url: _U + 'send_text',
            type: "post",
            data: {send: 1, code: $("#country_code").val(), number: $("#number").val(), text: $("#text").val()},
            success: function(r) {
                if (r == 1) {

                    $("#success").html('Message Sent Successfully!');
                }
                if (r == 2)
                {
                    $("#div1").hide();
                    $("#div2").show();
                    $("#error").html('Sorry!.. send message failed');
                }
                 if (r == 3)
                {
                    $("#div1").hide();
                    $("#div2").show();
                    $("#error").html('Sorry!.. Authentication failure');
                }

            }
        });
    }
</script>
