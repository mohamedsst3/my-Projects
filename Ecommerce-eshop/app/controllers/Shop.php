<?php 

class Shop extends Core\Controller{

    public function index(){
        $data = array();

        $limit =3;
        $page_number = isset($_GET['pg']) ? (int)$_GET['pg']: 1;
        $page_number = $page_number < 1 ? 1 : $page_number ;
        $offset = ($page_number - 1) * $limit;      

        if(isset($_GET['find'])){

            $image_class = $this->load_model("image");

            $product_class = $this->load_model("Product_mod");
            $product = $product_class->GetProducts_BySearch($_GET['find']);
             
            $data['product'] = "";
            if(is_array($product)){
              
              foreach($product as $key => $row){
              $product[$key]->image = $image_class->get_thumb_post($product[$key]->image);
              }
                $data['product'] = $product;
              
            }
    
            $data['Page_Title'] = "Save";
        }else{
            $image_class = $this->load_model("image");

            $product_class = $this->load_model("Product_mod");
            $product = $product_class->GetProducts($limit, $offset);
             
            $data['product'] = "";
            if(is_array($product)){
              
              foreach($product as $key => $row){
              $product[$key]->image = $image_class->get_thumb_post($product[$key]->image);
              }
                $data['product'] = $product;
              
            }
    
            $data['Page_Title'] = "Save";
        }

                
        //Get All Category
        $category = $this->load_model("category_mod");
        $category = $category->get_all();
        $data['category'] = $category;
      //  $data['Page_links'] = $this->get_pagination();


           //get the Data For The Header
           $user = $this->load_model('Login_mod');
           $user_data = $user->check_login();
           if(is_object($user_data)){
             $data['user_data'] = $user_data;
           }

     
       $this->view("eshop/user/shop", $data);
    }



    public function category($a) {
      
        $data = array();

        $a = $a[2];

        $limit =3;
        $page_number = isset($_GET['pg']) ? (int)$_GET['pg']: 1;
        $offset = ($page_number - 1) * $limit;
      

        if(isset($_GET['find'])){

            $image_class = $this->load_model("image");

            $product_class = $this->load_model("Product_mod");
            $product = $product_class->GetProducts_BySearch($_GET['find']);
             
            $data['product'] = "";
            if(is_array($product)){
              
              foreach($product as $key => $row){
              $product[$key]->image = $image_class->get_thumb_post($product[$key]->image);
              }
                $data['product'] = $product;
            }
    
            $data['Page_Title'] = "Save";
        }else{
            $image_class = $this->load_model("image");

            $product_class = $this->load_model("Product_mod");
            
            $product = $product_class->GetProductsByCategory($a);

            $data['product'] = "";
            if(is_array($product)){
              
              foreach($product as $key => $row){
              $product[$key]->image = $image_class->get_thumb_post($product[$key]->image);
              }
                $data['product'] = $product;
              
            }
    
            $data['Page_Title'] = "Save";
        }

        //get the Data For The Header
        $user = $this->load_model('Login_mod');
        $user_data = $user->check_login();
        if(is_object($user_data)){
          $data['user_data'] = $user_data;
        }
        


        //Get All Category
        $category = $this->load_model("category_mod");
        $category = $category->get_all();
        $data['category'] = $category;

      
        $this->view("eshop/user/shop", $data);

    }
   

    

 }