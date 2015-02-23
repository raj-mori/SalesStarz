
<div class="addAffiliates actionItem">
    <div class="panel panel-default">
        <div class="panel-heading">Send Text</div>
        <div class="panel-body">
            <form method="post" action="" class="form-horizontal" role="form" >
                <div class="form-group">
                    <label  class="col-lg-2 control-label">Enter Your Number </label>
                    <div class="col-lg-1">
                        <input type="text" class="form-control" name="code" id="code"  placeholder="Code" required>

                    </div>
                    <div class="col-lg-2">
                        <input type="text" class="form-control" name="number" id="number"  placeholder="Number" required>

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
     
        $.ajax({
            url: _U + 'send_text',
            type: "post",
            data: {send: 1, code: $("#code").val(), number: $("#number").val(), text: $("#text").val()},
            success: function(r) {
            }
        });
    }
</script>
<?php
if ($_REQUEST['send']) {


    $user = "Admin_SB24";
    $password = "PKbXXGLKPIRYaT";
    $api_id = "3526569";
    $baseurl = "http://api.clickatell.com";

    $text = urlencode($_REQUEST['text']);
    $to = $_REQUEST['code'] . "" . $_REQUEST['number'];

    // auth call
    $url = "$baseurl/http/auth?user=$user&password=$password&api_id=$api_id";

    // do auth call
    $ret = file($url);

    // explode our response. return string is on first line of the data returned
    $sess = explode(":", $ret[0]);
    if ($sess[0] == "OK") {

        $sess_id = trim($sess[1]); // remove any whitespace
        $url = "$baseurl/http/sendmsg?session_id=$sess_id&to=$to&text=$text";
     
        // do sendmsg call
        $ret = file($url);
        $send = explode(":", $ret[0]);

        if ($send[0] == "ID") {
            echo "successnmessage ID: " . $send[1];
        } else {
            echo "send message failed";
        }
    } else {
        echo "Authentication failure: " . $ret[0];
    }
   
}
?>