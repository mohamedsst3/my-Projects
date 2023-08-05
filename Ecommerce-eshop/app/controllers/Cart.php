<?php 

class Cart extends Core\Controller{

    public function index(){
        
        $product_class = $this->load_model("Product_mod");
       
        $cartProsegure = $this->load_model("CartProsegure");
        
        $image_class = $this->load_model("Image");

       $val = $cartProsegure->GetCartProducts($product_class, $image_class);
     
       $data['product'] = $val;

        //display the AddToCart Products
        $result = $cartProsegure->DisplayCartProduct();

        if($result){
        $data['Rows'] = $result['Rows'];

        $data['qty'] = $result['qty'];
        }
        //add total price to the session
       
        if(!empty($data['Rows'])){
        foreach($data['Rows'] as $cart){
          foreach($_SESSION['CART'] as $key => $val) {
            if($cart->id == $val['id']) {
            $_SESSION['CART'][$key]['total'] = (int)$cart->price * (int)$val['qty'];
            }
          }
        }
        }


        $user = $this->load_model('Login_mod');
        $user_data = $user->check_login();
      
      
        if(is_object($user_data)){
          $data['user_data'] = $user_data;
        }
          

        $data['Page_Title'] = "Save";
        $this->view("eshop/user/cart", $data);
    }
}