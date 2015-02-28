<?php
if ($_REQUEST['send']) {

    $click = qs("SELECT * FROM click_tell ");

    $user = trim($click['user']);
    $password = trim($click['password']);
    $api_id = trim($click['api_id']);
    $baseurl = trim($click['base_url']);

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
            echo '1';
            die;

//            echo "successnmessage ID: " . $send[1];
        } else {
            echo '2';
            die;
//            echo "send message failed";
        }
    } else {
        echo '3';
        die;
//        echo "Authentication failure: " . $ret[0];
    }
}
?>