<?php

use Core\Controller;

class Home extends Controller{
 
  public function  index($link){
  
     $limit = 100; 
     $offset = 0;
    if(isset($_GET['pg'])){
      $limit =3;
      $page_number = isset($_GET['pg']) ? (int)$_GET['pg']: 1;
      $offset = ($page_number - 1) * $limit;
    }

  $user = $this->load_model('Login_mod');
  $user_data = $user->check_login();

  $image_class = $this->load_model("image");

  if(is_object($user_data)){
    $data['user_data'] = $user_data;
  }

  $product_class = $this->load_model("Product_mod");
 
  if(!empty($_SESSION['Price_range'])){
    $product = $product_class->get_all_byprice_range($_SESSION['Price_range']);
  }else{
    $product = $product_class->get_all($limit, $offset);
  }
 
 

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
  
  //get the slider_image data
  $admin = $this->load_model("FrontWebImage_model");
    
  $dt = $admin->get_ImageSlider_data();
  if($dt != null && count($dt) > 0){
  $data['image_slider'] = $dt;
  }
 
  if(!empty($link[1])){
  $data['bottom_cat'] = $product_class->get_product($link[1]);
  }
  $DB = Database::newgetins();
  $data['segment'] = $this->get_segment_data($DB, $data['category'], $image_class);

  $data['three_Product'] = $product_class->get_three_Products();
  $data['three_Product_desc'] = $product_class->get_three_Products_DESC();

  $brand_model = $this->load_model("brand_mod");
  $data['brands'] = $brand_model->get_Brands();

  $data['Page_Title'] = "HomePage";   
   
  $this->view("eshop/user/Home", $data);
  }


  private function get_segment_data($db, $categories, $image_class){
    $results = array();
    $num = 0;
    //get the category for the product
    if($categories){
    foreach($categories as $cat){

    $arr['id'] = $cat->id;

    $query = "SELECT * FROM products WHERE category = :id";
    $ROWS = $db->read($query, $arr);

    if(is_array($ROWS)){ // \w any thing non word
    $cat->category = preg_replace("/\W+/", "_", $cat->category);
   
    //crop images
    foreach($ROWS as $key => $val){
      $ROWS[$key]->image = $image_class->get_thumb_post($ROWS[$key]->image);
    }

    $results[$cat->category] = $ROWS;
    
    }
    }
  }

    return $results;
  }

}