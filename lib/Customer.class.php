<?php

/**
 * Customer Class
 * 
 * 
 * 
 */
class Customer {
    # constructor

    public static $user_data = array();

    public function __construct() {
        
    }

    public static function add($fields) {
        // Escape array for sql hijacking prevention
        $data = _escapeArray($fields);

        $map = array();

        $map['user_name'] = 'user_name';
        $map['first_name'] = 'first_name';
        $map['last_name'] = 'last_name';
        $map['email'] = 'email';
        $map['mail_subject'] = 'mail_subject';
        $map['mail_content'] = 'mail_content';
        $map['phone_no'] = 'phone_no';
        $map['credit_card'] = 'credit_card';
        $map['salesperson'] = 'salesperson';
        $data['salesperson'] = $_SESSION['user']['id'];
        $ds = _bindArray($data, $map);
        return qi('customer', $ds);
    }

    public static function update($fields, $id) {
        // Escape array for sql hijacking prevention
        $data = _escapeArray($fields);
        $map = array();


        $map['user_name'] = 'user_name';
        $map['first_name'] = 'first_name';
        $map['last_name'] = 'last_name';
        $map['email'] = 'email';
        $map['mail_subject'] = 'mail_subject';
        $map['mail_content'] = 'mail_content';
        $map['phone_no'] = 'phone_no';
        $map['credit_card'] = 'credit_card';
        $map['salesperson'] = 'salesperson';
        $data['salesperson'] = $_SESSION['user']['id'];
        $ds = _bindArray($data, $map);
        $condition = "id = " . $id;
        return qu('customer', $ds, $condition);
    }

    public static function delete($id) {
        $condition = "id =" . $id;
        return qd('customer', $condition);
    }

    public static function GetCustomerList($id) {

        if ($id != '') {
            return q("SELECT * FROM customer where salesperson =  " . $id);
        } else {
            if ($_SESSION['user']['user_type'] == "Master Admin") {
                return q("SELECT * FROM customer ");
            } else {
                return q("SELECT * FROM customer where salesperson =  " . $_SESSION['user']['id']);
            }
        }
    }

    public static function CheckCustomerUsername($username, $id = '') {
        $where = '';
        if ($id != '') {
            $where.=" AND id != " . $id;
        }
        $where.=" AND user_name = '" . $username . "'";
        //return q("SELECT id FROM role WHERE 1=1" . $where);
        return qs("SELECT * FROM customer where 1=1" . $where);
    }

    public static function CheckCustomerEmail($email, $id = '') {
        $where = '';
        if ($id != '') {
            $where.=" AND id != " . $id;
        }
        $where.=" AND email = '" . $email . "'";

        return q("SELECT * FROM customer where 1=1" . $where);
    }

    public static function GetCustomerDetail($id) {
        return qs("SELECT * FROM customer where id=" . $id);
    }

    public static function GetSalespersonName($id) {
        $res = qs("SELECT first_name,last_name FROM salesperson where id=" . $id);
        return $res['first_name'] . " " . $res['last_name'];
    }

}
?>

