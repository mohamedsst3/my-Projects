<?php 

class Admin extends Core\Controller{
 


  public function index(){
  
  //check if the user is admin Or Not
  $admin = $this->load_model("Admin_mod", "Admin/");
  $is_Admin = $admin->Admin_config();

   if($is_Admin){
   $data['admin_info'] = $is_Admin;
   }else{
   session_destroy();
   header("Location: ".ROOT."Home");
   exit();
   }

   $data['Page_Title'] = "Admin"; 
   $this->view("eshop/Admin/index", $data);
 
   
  }





}