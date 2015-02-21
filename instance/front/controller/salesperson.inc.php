<?php

$urlArgs = _cg("url_vars");

if (isset($_REQUEST['fields']) && $_REQUEST['fields']['salesperson_id'] == '') {

    $_REQUEST['fields']['password'] = md5($_REQUEST['fields']['password']);

    $new_salesperson_id = Salesperson::add($_REQUEST[fields]);
    if ($new_salesperson_id > 0) {
        $greetings = "New Salesperson inserted successfully";
    } else {
        $error = "Unable to add new Salesperson";
    }
}

if (isset($_REQUEST['fields']) && $_REQUEST['fields']['salesperson_id'] > 0) {
    $new_salesperson_id = Salesperson::update($_REQUEST['fields'], $_REQUEST['fields']['salesperson_id']);
    if ($new_salesperson_id > 0) {
        $greetings = "Salesperson updated successfully";
        unset($_REQUEST['fields']);
    } else {
        $error = "Salesperson Not exists";
    }
}

$addIcon = "plus";
$addLabel = "Add Salesperson";
$action_type = "add";

$type = '';
$username = '';
$password = '';
$email = '';
$address = '';
$phone = '';

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
