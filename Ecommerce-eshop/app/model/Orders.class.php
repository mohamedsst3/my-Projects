<?php 




class Orders {

    private $database;

    public function __construct()
    {
        $this->database = Database::newgetins();
    }

    public function get_orderby_user($user_url) {
        $db = $this->database;
        $orders = false;
        $arr['user_url'] = $user_url;
        $query = "SELECT * FROM orders WHERE user_url = :user_url";
        $rs  = $db->read($query , $arr);
        if(is_array($rs)){
        $orders = $rs;
        }
        return $orders;
    }

    public function get_all_orders() {
        $db = $this->database;
        $orders = false;

        $query = "SELECT * FROM orders ORDER BY id DESC";

        $results = $db->read($query);

        if(is_array($results)){

        $orders = $results;
        }
        return $orders;
    }

    public function get_order_details_byId($id) {
    $db = $this->database;
    $orders = false;
    $arr['id'] = $id;
    $query = "SELECT * FROM order_detailes WHERE order_id = :id";
    $rs  = $db->read($query, $arr);
    if(is_array($rs)){
    $orders = $rs;
    }

    return $orders;
    }


}