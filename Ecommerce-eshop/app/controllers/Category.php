<?php


class Category extends Core\Controller{
 
  public function  index(){

  $user = $this->load_model('Login_mod');
  $user_data = $user->check_login();

  $image_class = $this->load_model("image");

  if(is_object($user_data)){
    $data['user_data'] = $user_data;
  }

  $product_class = $this->load_model("Product_mod");
  $product = $product_class->get_all();
   
  $data['product'] = "";
  if(is_array($product)){
    
    foreach($product as $key => $row){
    $product[$key]->image = $image_class->get_thumb_post($product[$key]->image);
    }
      $data['product'] = $product;
    
  
  }
  
  //Get All Category
  $category = $this->load_model("category_mod");
  $category = $category->get_all();
  $data['category'] = $category;
 
   $data['Page_Title'] = "HomePage"; 
   $this->view("eshop/user/index", $data);
  }
}