<?php  

class Ajax_mod {

   public function datas($data, $product, $image_class)
    {
      
        /**
         * Add 
         * Product
         */
        if($data->data_type == "add_product"){
         
        $product->create($data, $_FILES, $image_class);

        if($_SESSION['Errors'] != ""){
            $arr["message"] = $_SESSION['Errors'];
            $arr['message_type'] = "error";
            $arr['data'] = "";
            echo json_encode($arr);

        }else{
          $arr["message"] = "Product Added successfuly";
          $arr['message_type'] = "info";
          $cats = $product->get_all();
          $arr['data'] = $product->create_teble($cats);
          echo json_encode($arr);
        }
            
        }elseif($data->data_type == "delete_row") {

          $product->delete($data);
 
          $cats = $product->get_all();
 
          $arr['data'] = $product->create_teble($cats);
 
          echo json_encode($arr);

         } elseif($data->data_type == "Edit_product"){
 
           $product->Edit($data, $_FILES, $image_class);
 
           $cats = $product->get_all();
 
           $arr['message'] = "The Category Is Edit Success";
 
           $arr['data'] = $product->create_teble($cats);
 
           echo json_encode($arr);
         
 
         } elseif($data->data_type == "Enadbel_disable"){
 
           $product->Dis_En($data);
 
           $cats = $product->get_all();
 
           $arr['message'] = "ds_En";
 
           $arr['data'] = $product->create_teble($cats);
 
           echo json_encode($arr);
 
         }
    }
}