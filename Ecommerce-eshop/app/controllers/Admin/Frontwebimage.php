<?php 



class Frontwebimage extends Core\Controller{


    
 public function LoadImages() {

    $image_class = $this->load_model("image");
    
    $admin = $this->load_model("Admin_mod", "Admin/");
    $is_Admin = $admin->Admin_config();
     if($is_Admin){
     $data['admin_info'] = $is_Admin;
     }
  
      $webimage = $this->load_model("FrontWebImage_model");
     if(isset($_FILES) && isset($_POST)){
     $res = $webimage->AddImage($_POST, $_FILES, $image_class);
  
     if($res){
      header("Location: ".ROOT."Admin");
      exit();
     }
    }
  
  
  
    $data['Page_Title'] = "Orders";
    $this->view("eshop/Admin/SliderImage", $data);
  
   
   }
}