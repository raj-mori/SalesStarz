<?php

$urlArgs = _cg("url_vars");

if (isset($_REQUEST['fields']) && $_REQUEST['fields']['customer_id'] == '') {
    if (!Customer::CheckCustomerUsername($_REQUEST['fields']['user_name'])) {
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
    } else {
        $error = "Customer User Name Available";
    }
}
if (isset($_REQUEST['fields']) && $_REQUEST['fields']['customer_id'] > 0) {
    if (!Customer::CheckCustomerUsername($_REQUEST['fields']['user_name'],$_REQUEST['fields']['customer_id'])) {
        if (!Customer::CheckCustomerEmail($_REQUEST['fields']['email'],$_REQUEST['fields']['customer_id'])) {
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
    } else {
        $error = "Customer User Name Available";
    }
}

$addIcon = "plus";
$addLabel = "Add Customer";
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
        $subTpl = "customer_add.php";
        $addIcon = "edit";
        $addLabel = "Edit Customer";
        $action_type = "edit";
        $activeMenuAdd = "active";
        if ($urlArgs[1] > 0) {
            $view_data = Customer::GetCustomerDetail($urlArgs[1]);

            $user_name = $view_data['user_name'];
            $first_name = $view_data['first_name'];
            $last_name = $view_data['last_name'];
            $email = $view_data['email'];
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
        $customer_Detail = Customer::GetCustomerList();
        $subTpl = "customer_list.php";
        $activeMenuList = "active";
}


$jsInclude = "customer.js.php";
_cg("page_title", "Customer");
?>
