<?php 



class Blogs extends Core\Controller {

    
 public function AddNewBlog() {
  
    $admin = $this->load_model("Admin_mod", "Admin/");
  
    $is_Admin = $admin->Admin_config();
     if($is_Admin){
     $data['admin_info'] = $is_Admin;
     }
  
     $BlogProcess = $this->load_model("BlogProcess","Admin/");
  
      if(isset($_POST) && count($_POST) > 0 && isset($_FILES)) {
        
        $image_class = $this->load_model("image");
        $User = $this->load_model("User");
        $author =  $User->GetId_ByUserUrl($_SESSION['user_url']);
        $save_blog = $BlogProcess->Sava_Blog_data($_POST, $_FILES, $image_class, $author);
        
      if($save_blog){
        header('Location: '.ROOT.'Admin/Admin');
        exit();
      }
      }
  
    $data['Page_Title'] = "Orders";
    $this->view("eshop/Admin/settings", $data);
  
   
   }
}