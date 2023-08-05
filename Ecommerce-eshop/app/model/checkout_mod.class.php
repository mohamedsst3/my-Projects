<?php

class checkout_mod {

    private $database;

    public function __construct()
    {
        $this->database = Database::newgetins();
    }


    public function save_ckeckout($POST, $res, $userid, $sessionid) {
        $dbs = $this->database;
           $total = 0;
        foreach($res as $row) {
            $total += $row->Cart_qty * $row->price; 
        }
    
       
        if(is_array($res)){
        $data = array();
        $data[] = $POST['Address'];
        $data[] = $total;
        $data[] = $POST['Scountry'];
        $data[] = $POST['Sstate'];
        $data[] = $POST['PostalCode'];
        $data[] = 0;
        $data[] = 0;
        $data[] = date("Y:m:d H-i-s");
        $data[] = $userid;
        $data[] = $sessionid;
        $data[] = $POST['HomePhone'];
        $data[] = $POST['MobilePhone'];
       
        $query = "INSERT INTO orders (delevery, total, country, states, zip, tax, shipping, date, user_url, session, home_phone, mobile_phone) VALUES (?, ?, ?,?,?,?,?,?,?,?,?,?)";
        $dbs->write($query, $data);
      
        //save details in order_detailes Table
        $data = array();
        $orderid = 0;
        $query = "SELECT * FROM orders ORDER BY id DESC LIMIT 1";
        $results = $dbs->read($query);

        if(is_array($results)){ 
            $orderid = $results[0]->id;
        }
        
        foreach($res as $rows){
            #code...
            $data = array();
            $data['order_id'] = $orderid;
            $data['qty'] = $rows->quantity;
            $data['description'] = $rows->description;
            $data['amount'] = $rows->price;
            $data['total'] = $rows->price * $rows->Cart_qty;
            $data['product_id'] = $rows->id;

            $query = "INSERT INTO order_detailes (order_id, qty, description, amount, total, product_id) VALUES (:order_id, :qty, :description, :amount, :total, :product_id)";
            $dbs->write($query, $data);
            
        }

        }
    }

    public function validate($POST){
        $Error_array = array();
        if(isset($POST['Scountry'])){
            if(!preg_match('/^[0-9]+$/',$POST['Scountry'])){
                $Error_array[] = "The Country is Not Valid";
            }
            if(isset($POST['Sstate'])){
         
            if(!preg_match("/^[0-9]+$/", $POST['Sstate'])){
                $Error_array[] = "The State Is Not Valid";
            }
         }else{
            $Error_array[] = "Please Select a State";
         }
        }else{
            $Error_array[] = "Please Choose Your Country";
        }
        if(empty($POST['Address'])){
            $Error_array[] = "The Address Is Empty";
        }
        if(!isset($POST['PostalCode'])){
            $Error_array[] = "The PostalCode Is Empty";
        }
        if(!isset($POST['HomePhone'])){ 
            $Error_array[] = "The HomePhone Is Empty";
        }
        if(!isset($POST['MobilePhone'])){
            $Error_array[] = "The MobilePhone Is Empty";
        }
       
      

        return $Error_array;

    }


 
   
       public function get_state($country){
           $db = $this->database;
           
           $arr['country'] = $country;
           $query = "SELECT * FROM countries WHERE id = :country ";
           
           $result = $db->read($query, $arr);

           if($result){
           $arr = null;
           $query = "";
             foreach($result as $value){
            $arr['parent'] = $value->id;
            }
            
            $query = "SELECT * FROM states WHERE parent = :parent ";
            $res = $db->read($query, $arr);
            if($res){
           
                return $res;
            
            
            }else{
                $data['eror'] = "No Data Found";
                return $data;
            }
        
          
          }
    
          
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

     public function get_order_details($id) {
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