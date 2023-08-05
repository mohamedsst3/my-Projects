<?php 





class Products extends Core\Controller{



    public function ShowProducts(){
      
        $admin = $this->load_model("Admin_mod", "Admin/");
        $is_Admin = $admin->Admin_config();
      
        if($is_Admin){
      
        $data['Page_Title'] = "Admin";
        $data['admin_info'] = $is_Admin;
      
        $category_model = $this->load_model("category_mod");

        $Product_model = $this->load_model("Product_mod");

      
        $Products = $Product_model->GetProducts();
      
        $categoties_c = $category_model->get_all();
      

        
        $admin_tables = $this->load_model("Admin_tables", "Admin/");
        
        $rows = $admin_tables->create_teble($Products, $category_model);
      
          $data["rows"] = $rows;
          
          $data["categories"] = $categoties_c;

        $Brands = $this->load_model("Brand_mod");

        $data['Brands'] = $Brands->get_Brands();

        $this->view("eshop/Admin/Products", $data);
      
        }else{
        header("Location: ".ROOT."Home");
        exit();
        }
      
          
        }
}