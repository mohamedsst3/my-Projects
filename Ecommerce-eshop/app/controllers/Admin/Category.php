<?php 


class Category extends Core\Controller{

    private $db;

    public function __construct()
    {
        $this->db = Database::newgetins();
    }

    public function ShowCaterories(){
  
        $admin = $this->load_model("Admin_mod", "Admin/");
        $is_Admin = $admin->Admin_config();
     
      
        if($is_Admin){
         
        $data['Page_Title'] = "Admin"; 
        $data['admin_info'] = $is_Admin;
            
       

        $category_model = $this->load_model("category_mod");

        $Admin_tables = $this->load_model("Admin_tables","Admin/");
    
        $category = $category_model->get_all();

        $rows = $Admin_tables->create_categories_teble($category);

        //Get All Categories 
        

        
        if(!empty($rows)){
          $data["rows"] = $rows;
          $data['category'] = $category;
        }
        $this->view("eshop/Admin/categories", $data);
     
        }else{
        header("Location: ".ROOT."Home");
        exit();
        }
        
       }
    
       
   
}