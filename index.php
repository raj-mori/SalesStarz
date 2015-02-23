<?php

/**
 *
* @author Raj Mori <raj.mori90@gmail.com>
 * @version 1.0
 * @package Sales Starz
 * 

 */
session_start();
error_reporting(0);


# DB informaitons
define('DB_HOST', '127.0.0.1');
define('DB_PASSWORD', '');
define('DB_UNAME', 'root');
define('DB_NAME', 'sales_starz');
define('IS_DEV_ENV', true); # ifbyphone ivr id for driver if they missed the text

define('SMTP_EMAIL_USER_NAME', 'raj.mori90@gmail.com'); # smtp service username
define('SMTP_EMAIL_USER_PASSWORD', 'mori1@#4'); # smtp service password
define('MAIL_FROM_EMAIL', 'raj.mori@gmail.com'); # email to be used a from email
define('MAIL_FROM_NAME', 'Sales Starz'); # name to be used as from email
include "loader.php";
?>
