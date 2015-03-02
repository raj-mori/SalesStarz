<?php

error_reporting(E_ALL);
$urlArgs = _cg("url_vars");

if (isset($_REQUEST['fields']) && $_REQUEST['fields']['salesperson_id'] == '') {

    $check_username = Salesperson::CheckSalespersonrUsername($_REQUEST['fields']['user_name']);
    if (empty($check_username)) {
        $check_email = Salesperson::CheckSalespersonrEmail($_REQUEST['fields']['email']);
        if (empty($check_email)) {
            $_REQUEST['fields']['password'] = md5($_REQUEST['fields']['password']);

            $new_salesperson_id = Salesperson::add($_REQUEST['fields']);
            if ($new_salesperson_id > 0) {
                $greetings = "New Salesperson inserted successfully";
            } else {
                $error = "Unable to add new Salesperson";
            }
        } else {
            $error = "Sales Person Email Available";

            $user_name = $_REQUEST['fields']['user_name'];
            $first_name = $_REQUEST['fields']['first_name'];
            $last_name = $_REQUEST['fields']['last_name'];
            $email = $_REQUEST['fields']['email'];
            $phone = $_REQUEST['fields']['phone_no'];
        }
    } else {
        $error = "Sales Person User Name Available";

        $user_name = $_REQUEST['fields']['user_name'];
        $first_name = $_REQUEST['fields']['first_name'];
        $last_name = $_REQUEST['fields']['last_name'];
        $email = $_REQUEST['fields']['email'];
        $phone = $_REQUEST['fields']['phone_no'];
    }
}

if (isset($_REQUEST['fields']) && $_REQUEST['fields']['salesperson_id'] > 0) {
    $check_username = Salesperson::CheckSalespersonrUsername($_REQUEST['fields']['user_name'], $_REQUEST['fields']['salesperson_id']);
    if (empty($check_username)) {
        $check_email = Salesperson::CheckSalespersonrEmail($_REQUEST['fields']['email'], $_REQUEST['fields']['salesperson_id']);
        if (empty($check_email)) {
            $new_salesperson_id = Salesperson::update($_REQUEST['fields'], $_REQUEST['fields']['salesperson_id']);
            if ($new_salesperson_id > 0) {
                $greetings = "Salesperson updated successfully";
                unset($_REQUEST['fields']);
            } else {
                $error = "Salesperson Not exists";
            }
        } else {
            $error = "Sales Person Email Available";

            $user_name = $_REQUEST['fields']['user_name'];
            $first_name = $_REQUEST['fields']['first_name'];
            $last_name = $_REQUEST['fields']['last_name'];
            $email = $_REQUEST['fields']['email'];
            $phone = $_REQUEST['fields']['phone_no'];
        }
    } else {
        $error = "Sales Person User Name Available";
        
         $user_name = $_REQUEST['fields']['user_name'];
        $first_name = $_REQUEST['fields']['first_name'];
        $last_name = $_REQUEST['fields']['last_name'];
        $email = $_REQUEST['fields']['email'];
        $phone = $_REQUEST['fields']['phone_no'];
    }
}

$addIcon = "plus";
$addLabel = "Add Salesperson";
$action_type = "add";



$id_val = '';
$add_password = 1;
switch ($urlArgs[0]) {
    case "edit":
        $add_password = 0;
        $subTpl = "salesperson_add.php";
        $addIcon = "edit";
        $addLabel = "Edit Salesperson";
        $action_type = "edit";
        $activeMenuAdd = "active";
        if ($urlArgs[1] > 0) {
            $view_data = Salesperson::GetSalespersonDetail($urlArgs[1]);

            $user_name = $view_data['user_name'];
            $first_name = $view_data['first_name'];
            $last_name = $view_data['last_name'];
            $email = $view_data['email'];
            $phone = $view_data['phone_no'];
//            $payment= $view_data['stripe_payment'];
            $id_val = $urlArgs[1];
        }
        break;
    case "add":
        $subTpl = "salesperson_add.php";
        $activeMenuAdd = "active";
        break;
    case "delete":
        $delete_data = Salesperson::delete($urlArgs[1]);
        if ($delete_data) {
            $greetings = "Salesperson deleted successfully";
            $_SESSION['greetings_msg'] = $greetings;
        } else {
            $error = "Unable to delete Salesperson";
            $_SESSION['error_msg'] = $error;
        }
        _R(lr('salesperson/list'));
        break;
    default:
        $salesperson_Detail = Salesperson::GetSalespersonList();
        $subTpl = "salesperson_list.php";
        $activeMenuList = "active";
}


$jsInclude = "salesperson.js.php";
_cg("page_title", "Sales Person");
?>
