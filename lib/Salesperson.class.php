<?php

/**
 * Salesperson Class
 * 
 * 
 * 
 */
class Salesperson {
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
        $map['phone_no'] = 'phone_no';
        $map['user_type'] = 'user_type';
        $map['password'] = 'password';
        $data['stripe_payment'] = 'payment';
        $data['user_type'] = 'Salesperson';


        $ds = _bindArray($data, $map);
        return qi('salesperson', $ds);
    }

    public static function update($fields, $id) {
        // Escape array for sql hijacking prevention
        $data = _escapeArray($fields);
        $map = array();


        $map['user_name'] = 'user_name';
        $map['first_name'] = 'first_name';
        $map['last_name'] = 'last_name';
        $map['email'] = 'email';
        $map['phone_no'] = 'phone_no';
         $data['stripe_payment'] = 'payment';

        $ds = _bindArray($data, $map);
        $condition = "id = " . $id;
        return qu('salesperson', $ds, $condition);
    }

    public static function delete($id) {
        $condition = "id =" . $id;
        return qd('salesperson', $condition);
    }

    public static function GetSalespersonList() {
        return q("SELECT * FROM salesperson ");
    }

    public static function GetSalespersonDetail($id) {
        return qs("SELECT * FROM salesperson where id=" . $id);
    }

    public static function CheckSalespersonrUsername($username, $id = '') {
        $where = '';
        if ($id != '') {
            $where.=" AND id != " . $id;
        }
        $where.=" AND user_name = '" . $username . "'";
        //return q("SELECT id FROM role WHERE 1=1" . $where);
        return qs("SELECT * FROM salesperson where 1=1" . $where);
    }

    public static function CheckSalespersonrEmail($email, $id = '') {
        $where = '';
        if ($id != '') {
            $where.=" AND id != " . $id;
        }
        $where.=" AND email = '" . $email . "'";

        return q("SELECT * FROM salesperson where 1=1" . $where);
    }

}
?>

