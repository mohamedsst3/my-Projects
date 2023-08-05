<?php 

class Single_product_mod {


    public function get_data(){
        $dbs = Database::getins();
 
        $arr['slag'] = $_GET['product'];
    
       $result = $dbs->read("SELECT * FROM products WHERE slag = :slag", $arr);
       return $result;
    }
}