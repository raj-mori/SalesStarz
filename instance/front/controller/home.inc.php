<?php

/**
 * Admin User Dashboard File
 * 
 * 
 * @author Raj Mori <raj.mori90@gmail.com>
 * @version 1.0
 * @package Sales Starz
 * 
 */

if ($_SESSION['user']['user_type'] == "Master Admin") {
    _R(lr('report'));
}
else {
        _R(lr('customer'));

}

_cg("page_title", "Dashboard");
?>