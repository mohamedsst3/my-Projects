<?php 



class Country extends Core\Controller {
    

    public function AddCountry() {

        $model = $this->load_model("Countries", "Admin/");
        if(isset($_POST) && $_POST != null){
        $model->AddNewCountry($_POST);
        }
      
        
        $admin = $this->load_model("Admin_mod", "Admin/");
        $is_Admin = $admin->Admin_config();
         if($is_Admin){
         $data['admin_info'] = $is_Admin;
         }
      
      
         $data['title'] = "AddNewCountry";
      
      
        $this->view("eshop/Admin/AddNewCountry", $data);
       }
}