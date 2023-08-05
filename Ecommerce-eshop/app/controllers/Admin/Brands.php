<?php 



class Brands extends Core\Controller{

public function AddNewBrand(){
 

    $admin = $this->load_model("Admin_mod", "Admin/");
    $is_Admin = $admin->Admin_config();
    
     if($is_Admin){
     $data['admin_info'] = $is_Admin;
     }
    
     $brand_model = $this->load_model("Brand_mod");
    
    
     if(isset($_POST) && $_POST != null){
      $brand_model->Insert_Data((object)$_POST);
     }
    
     $data['title'] = "Brands";
    
      $this->view("eshop/Admin/Brands", $data);
     }


}