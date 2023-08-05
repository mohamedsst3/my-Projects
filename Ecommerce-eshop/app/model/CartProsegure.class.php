<?php


class CartProsegure {

  private $db;



  public function __construct()
  {
    $this->db = Database::newgetins();
  }



    public function GetCartProducts($product_model,$image_model) {
 
         $product = $product_model->GetProducts(100, 0);
         
         //load the products
         $data['product'] = "";
         if(is_array($product)){
           
           foreach($product as $key => $row){
           $product[$key]->image = $image_model->get_thumb_post($product[$key]->image);
           
           }
          
             return $product;
         }
    }


    public function DisplayCartProduct() {

        if(isset($_SESSION['CART'])) {

          $dbs = $this->db; 

          $product_id = array_column($_SESSION['CART'], "id");
          $product_id = "'" . implode("','", $product_id) . "'";
          
          $result = $dbs->read("SELECT * FROM products WHERE id in ($product_id)");

          //add Cart_qty to the result
          if(is_array($result)){
            if(isset($_SESSION['user_url'])){
              rsort($result);
              $data['Rows'] = $result;
            }

            foreach($result as $key => $value) {
          
              foreach($_SESSION['CART'] as $Keysesion){
            
                if($value->id == $Keysesion['id']){
                  $result[$key]->Cart_qty = $Keysesion['qty'];
                  break;
              
                }
              
              }
            
            }


          
        }
      
      }
      if(!empty($_SESSION['CART'])){
      foreach($_SESSION['CART'] as $KEY) {
        $data['qty'] = $KEY['qty'];
      }
       
      }

      return !empty($data) ? $data: "";

    }
}