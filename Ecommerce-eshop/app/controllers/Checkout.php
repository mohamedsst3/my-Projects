<?php

class Checkout extends Core\Controller{

    public function index(){
        
      
        $product_class = $this->load_model("Product_mod");
        $product = $product_class->GetProducts(100, 0);
         
        //load the products
        $data['product'] = "";
        if(is_array($product)){
          $image_class = $this->load_model("image");
          foreach($product as $key => $row){
          $product[$key]->image = $image_class->get_thumb_post($product[$key]->image);
          
          }
         
            $data['product'] = $product;
        }
        if(isset($_SESSION['POST_DATA'])){
          $data['POST_DATA'] = $_SESSION['POST_DATA'];
       }

       $_SESSION['POST_DATA'] = $_POST;
       $data['POST_DATA'] = $_POST;

        //display the AddToCart Products
        if(isset($_SESSION['CART'])) {
            $dbs = Database::newgetins(); 

            $product_id = array_column($_SESSION['CART'], "id");
            $product_id = "'" . implode("','", $product_id) . "'";
             
            $result = $dbs->read("SELECT * FROM products WHERE id in ($product_id)");

           //add Cart_qty to the result
            if(is_array($result)){
              if(isset($_SESSION['user_url'])){
                if($result){
                rsort($result);
                }
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

       

        //Payment information To DataBase
        if(isset($_POST)  && count($_POST) > 0){
     
          $check = $this->load_model("checkout_mod");
          $userid = 0;
          $sessionid = session_id();
    
          if(isset($_SESSION['user_url'])){
            $userid = $_SESSION['user_url'];
          }
       
         $validate = $check->validate($_POST);
         if(empty($validate[0])){
          $check->save_ckeckout($_POST, $result, $userid, $sessionid);
         header("Location:".ROOT."Checkout/Sumarry");
         exit();
         }else{
          $data['errors'] = $validate[0];
         }
        
        }

        $cls = $this->load_model("Countries");

        $data['coutry'] = $cls->get_countries();

        $data['Page_Title'] = "Checkout";

        $user = $this->load_model('Login_mod');
        $user_data = $user->check_login();
      
      
        if(is_object($user_data)){
          $data['user_data'] = $user_data;
        }


      
        $this->view("eshop/user/checkout", $data);
    }

    public function thanks() {
      unset($_SESSION['CART']);
      header("Location:".ROOT."Home");
      exit;
    }



    public function Sumarry(){
        
        $data = array();

        $check = $this->load_model("checkout_mod");
     
       
        if(isset($_SESSION['user_url'])){

          $userid = $_SESSION['user_url'];

          $orders = $check->get_orderby_user($userid);

          $data['user_orders'] = $orders;

          foreach($orders as $order){
          $detailes = $check->get_order_details($order->id);
          }

          $ar = array_column($detailes, "total");
          $sumtotal = array_sum($ar);
      
          $data['details'] = $detailes;
          $data['Bill'] = $sumtotal;
        }

        
        $data['country_model'] = $this->load_model("Countries");
        $data['Page_Title'] = "Confirm";
      $this->view("eshop/user/checkout.summary", $data);
    }


    public function thank_you(){

      

      $data['Page_Title'] = "Confirm";
      $this->view("eshop/user/checkout.summary", $data);
    }

}
