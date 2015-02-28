<?php

$urlArgs = _cg("url_vars");
$addIcon = "plus";
$addLabel = "Add Template";
$action_type = "add";

if (isset($_REQUEST['fields']) && $_REQUEST['fields']['temp_id'] == '') {

    $data = _escapeArray($_REQUEST[fields]);
    $map = array();

    $map['template_name'] = 'tmp_name';
    $map['template_content'] = 'tmp_content';

    $ds = _bindArray($data, $map);
    $temp_id = qi('template', $ds);

    if ($temp_id > 0) {
        $greetings = "Tempalate inserted successfully";
    } else {
        $error = "Unable to Add Tempalate";
    }
}
if (isset($_REQUEST['fields']) && $_REQUEST['fields']['temp_id'] > 0) {

    $data = _escapeArray($_REQUEST[fields]);
    $map = array();

    $map['template_name'] = 'tmp_name';
    $map['template_content'] = 'tmp_content';

    $ds = _bindArray($data, $map);
    $condition = "id = " . $_REQUEST['fields']['temp_id'];
    $temp_id = qu('template', $ds, $condition);


    if ($temp_id > 0) {
        $greetings = "Tempalate updated successfully";
        unset($_REQUEST['fields']);
    } else {
        $error = "Tempalate Not exists";
    }
}

switch ($urlArgs[0]) {
    case "edit":
        $add_password = 0;
        $subTpl = "template_add.php";
        $addIcon = "edit";
        $addLabel = "Edit Template";
        $action_type = "edit";
        $activeMenuAdd = "active";
        if ($urlArgs[1] > 0) {
            $view_data = qs("select * from template where id='{$urlArgs[1]}'");


            $tmp_name = $view_data['tmp_name'];
            $tmp_content = $view_data['tmp_content'];

            $tmp_id = $urlArgs[1];
        }
        break;
    case "add":

        $subTpl = "template_add.php";
        $activeMenuAdd = "active";
        break;
    case "delete":
        
        $condition = "id =" . $urlArgs[1];
        $delete_data = qd('template', $condition);
        
        if ($delete_data) {
            $greetings = "Template deleted successfully";
            $_SESSION['greetings_msg'] = $greetings;
        } else {
            $error = "Unable to delete Template";
            $_SESSION['error_msg'] = $error;
        }
        _R(lr('template/list'));
        break;
    default:
        $template = q("select * from template");
        $subTpl = "template_list.php";
        $activeMenuList = "active";
}

$jsInclude = "template.js.php";
_cg("page_title", "Template");
?>

