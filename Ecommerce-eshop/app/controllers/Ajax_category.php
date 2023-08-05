<?php

class Ajax_category extends Core\Controller{
 
  public function  index(){

    //$HTTP_RAW_POST_DATA;
    //to get the body of JSON request
    $data = file_get_contents("php://input");
    //get the data from the category form input and send it by ajax request 
     $data = json_decode($data);
     
        if(is_object($data)){
        $category = $this->load_model("category_mod");

        if($data->data_type == "add_category"){
        // // Create Table 
        $category->create($data);

        if($_SESSION['Errors'] != ""){
            $arr["message"] = $_SESSION['Errors'];
            $arr['message_type'] = "error";
            $arr['data'] = "";
            echo  json_encode($arr);

        }else{
          $arr["message"] = "category Added";
          $arr['message_type'] = "info";
          $cats = $category->get_all();
          $arr['data'] = $category->create_teble($cats);
          echo json_encode($arr);
        }
            
            //Delete Table/category
        }
        elseif($data->data_type == "delete_row") {
         $category->delete($data);

         $cats = $category->get_all();

         $arr['data'] = $category->create_teble($cats);

         echo json_encode($arr);
        } elseif($data->data_type == "Edit_row"){

          $category->Edit($data);

          $cats = $category->get_all();

          $arr['message'] = "The Category Is Edit Success";

          $arr['data'] = $category->create_teble($cats);

          echo json_encode($arr);
        

        } elseif($data->data_type == "Enadbel_disable"){

          $category->Dis_En($data);

          $cats = $category->get_all();

          $arr['message'] = "ds_En";

          $arr['data'] = $category->create_teble($cats);

          echo json_encode($arr);

        }
    }
}

}