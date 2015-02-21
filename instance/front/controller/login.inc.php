<?php

/**
 * Admin side Login file
 * 
 * 
 * @author Raj Mori <raj.mori90@gmail.com>
 * @version 1.0
 * @package Sales Starz
 * 
 */
if (!isset($_SESSION['user'])) {
    if ($_REQUEST['username']) {

        $user_name = _escape($_REQUEST['username']);
        $password = md5(_escape($_REQUEST['password']));
        if (User::doLogin($user_name, $password)) {
            User::initUserSession();
            _R(lr('home'));
           
        } else {
            $error = "Invalid Credentials";
        }
        $jsInclude = "login.js.php";
    }
    $no_visible_elements = true;
} else {
    _R(lr('home'));
}
_cg("page_title", "Login");
?>