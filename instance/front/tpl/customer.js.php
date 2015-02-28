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

    function showMail(id, fname, lname)
    {
        alert(fname);
        $("#cust_id").val(id);
        $("#cust_fname").val(fname);
        $("#cust_lname").val(lname);


        $("#sendmail").modal("show");
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

                else
                {
                    $("#div1").hide();
                    $("#div2").show();
                    $("#error").html('Sorry!.. send Mail failed');
                }

            }
        });
    }
//send text using clicktell

    function showText(id)
    {

        $("#cust_id").val(id);
        $("#showText").modal("show");
    }
    function send()
    {

        $("#showText").modal("hide");
        $("#callModal").modal("show");
        $("#div2").hide();
        $('#div1').show();
        $("#success").html('<img src="<?php print _MEDIA_URL ?>img/ajax-loader.gif" />  Connecting!.....');
        $.ajax({
            url: _U + 'customer',
            type: "post",
            data: {send: 1, code: $("#country_code").val(), number: $("#number").val(), text: $("#text").val(), cust_id: $("#cust_id").val()},
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