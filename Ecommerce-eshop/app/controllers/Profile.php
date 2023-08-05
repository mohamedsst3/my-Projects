<?php

class Profile extends Core\Controller{


   public function index() {

    $Check = $this->load_model('Login_mod');
    $CheckLogin = $Check->check_login();

  $user = $this->load_model('User');
  
  $Orders = $this->load_model("Orders");
 
  $Product_cls = $Orders->get_orderby_user($CheckLogin->url_address);
 
  if(is_array($Product_cls)){
  foreach($Product_cls as $key => $row){
  $details = $Orders->get_order_details_byId($row->id);
  if(is_array($details)){

  $totals = array_column($details, "total");
  $grand_total = array_sum($totals);

  $Product_cls[$key]->grand_total = $grand_total;


  }

  //add the Details to The Array
  $Product_cls[$key]->details = $details;

  // Get User Info 
  $user_info = $user->get_user($row->user_url);

  $Product_cls[$key]->user = $user_info;
 

  }
}
 
  if(is_object($CheckLogin)){
    $data['user_data'] = $CheckLogin;
  }else{
   header("Location:".ROOT."Home");
   exit();
  }
  
  $data['orders'] = $Product_cls;

      $data['Page_Title'] = "Profile";
    $this->view("eshop/user/Profile", $data);
   }
}