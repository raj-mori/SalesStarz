<script type="text/javascript" >

    $(document).ready(function() {

    });
    function DeleteUser(url) {
        delUrl = url;
        $("#myModal").modal("show");
    }
    function DeleteAmount(url) {
        delUrl = url;
        $("#myModal").modal("show");
    }

    function showText()
    {

        $("#showText").modal("show");

    }
    function sendMail(id)
    {

        $("#callModal").modal("show");
        $("#div2").hide();
        $('#div1').show();
        $("#success").html('<img src="<?php print _MEDIA_URL ?>img/ajax-loader.gif" />  Connecting!.....');
        $.ajax({
            url: _U + 'customer',
            type: "post",
            data: {sendMail: 1, cust_id: id},
            success: function(r) {
                if (r == 1) {

                    $("#success").html('Mail Sent Successfully!');
                }
                if (r == 2)
                {
                    $("#div1").hide();
                    $("#div2").show();
                    $("#error").html('Sorry!.. send Mail failed');
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

    function send()
    {

        $("#showText").modal("hide");
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