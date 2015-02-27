<?php

//sending message using clicktell
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

            //flag change in db
            $data = qs("select * from customer where id='{$_REQUEST['cust_id']}'");
            $text_sent = $data['total_text_sent'] + 1;

            qu("customer", array('total_text_sent' => $text_sent), "id='{$_REQUEST['cust_id']}'");

            qi("customer_sales_info", array("cust_id" => $_REQUEST['cust_id'] ,"task_column" => 'Text Send', "is_text_sent" => 1));
            echo '1';

//            echo "successnmessage ID: " . $send[1];
        } else {
            echo '2';

//            echo "send message failed";
        }
    } else {
        echo '3';

//        echo "Authentication failure: " . $ret[0];
    }
    die;
}
//Mail
if ($_REQUEST['sendMail']) {
    $data = qs("SELECT * FROM customer where id=" . $_REQUEST['cust_id']);

    $id = $_REQUEST['cust_id'];
    $to = $data['email'];
    $subject = $data['mail_subject'];
    $content = $data['mail_content'];

//    $to = 'admin@gmail.com';
//    $subject = 'ssss';
//    $content = 'sssssss';

    ob_start();
    include _PATH . "instance/front/tpl/mail_general_format.php";
    $mail = ob_get_contents();
    ob_end_clean();

    $mail = _mail($to, $subject, $mail);

    if ($mail == 1 || $mail == 2) {

        //flag change in db
        $data = qs("select * from customer where id='{$id}'");
        $mail_sent = $data['total_mail_sent'] + 1;

        qu("customer", array('total_mail_sent' => $mail_sent), "id='{$id}'");

        qi("customer_sales_info", array("cust_id" => $id ,"task_column" => 'Mail Send', "is_mail_sent" => 1));

        echo '1';
    } else {
        echo '2';
    }
    die;
}
$urlArgs = _cg("url_vars");

if (isset($_REQUEST['fields']) && $_REQUEST['fields']['customer_id'] == '') {

        if (!Customer::CheckCustomerEmail($_REQUEST['fields']['email'])) {
            $new_customer_id = Customer::add($_REQUEST[fields]);
            if ($new_customer_id > 0) {
                $greetings = "New Customer inserted successfully";
            } else {
                $error = "Unable to add new Customer";
            }
        } else {
            $error = "Customer Email Available";
        }
  
}
if (isset($_REQUEST['fields']) && $_REQUEST['fields']['customer_id'] > 0) {

        
        if (!Customer::CheckCustomerEmail($_REQUEST['fields']['email'], $_REQUEST['fields']['customer_id'])) {
            $new_customer_id = Customer::update($_REQUEST['fields'], $_REQUEST['fields']['customer_id']);
            if ($new_customer_id > 0) {
                $greetings = "Customer updated successfully";
                unset($_REQUEST['fields']);
            } else {
                $error = "Customer Not exists";
            }
        } else {
            $error = "Customer Email Available";
        }

}

$addIcon = "plus";
$addLabel = "Add Customer";
$action_type = "add";

$type = '';

$password = '';
$email = '';
$address = '';
$phone = '';
$mail_content = '';
$mail_subject = '';

$id_val = '';
$add_password = 1;
switch ($urlArgs[0]) {
    case "edit":
        $add_password = 0;
        $subTpl = "customer_add.php";
        $addIcon = "edit";
        $addLabel = "Edit Customer";
        $action_type = "edit";
        $activeMenuAdd = "active";
        if ($urlArgs[1] > 0) {
            $view_data = Customer::GetCustomerDetail($urlArgs[1]);

          
            $first_name = $view_data['first_name'];
            $last_name = $view_data['last_name'];
            $email = $view_data['email'];
            $mail_subject = $view_data['mail_subject'];
            $mail_content = $view_data['mail_content'];
            $phone = $view_data['phone_no'];
            $id_val = $urlArgs[1];
        }
        break;
    case "add":
        $subTpl = "customer_add.php";
        $activeMenuAdd = "active";
        break;
    case "delete":
        $delete_data = Customer::delete($urlArgs[1]);
        if ($delete_data) {
            $greetings = "Customer deleted successfully";
            $_SESSION['greetings_msg'] = $greetings;
        } else {
            $error = "Unable to delete Customer";
            $_SESSION['error_msg'] = $error;
        }
        _R(lr('customer/list'));
        break;
    default:
        if (isset($urlArgs[1])) {
            $customer_Detail = Customer::GetCustomerList($urlArgs[1]);
        } else {
            $customer_Detail = Customer::GetCustomerList();
        }

        $subTpl = "customer_list.php";
        $activeMenuList = "active";
}


$jsInclude = "customer.js.php";
_cg("page_title", "Customer");
?>
