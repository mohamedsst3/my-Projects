<?php

class Ajax_product extends Core\Controller{
 
  public function  index(){

    // $data = file_get_contents("php://input");

     $data = (object)$_POST;


        if(is_object($data)){

        $cls = $this->load_model("Ajax_mod");
        $product = $this->load_model("Product_mod");
        $image_class = $this->load_model("Image");
        
        $cls->datas($data, $product, $image_class);

        
    }
}

}