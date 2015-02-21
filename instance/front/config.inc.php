<?php

$auth_pages = array();
$auth_pages[] = "home";
$auth_pages[] = "salesperson";


if ($_REQUEST['logout']) {
    User::killSession();
}

_auth_url($auth_pages, "login");
?>