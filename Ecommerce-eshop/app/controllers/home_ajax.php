<?php


class home_ajax {

    public function slow() {


       $data = $_POST['price'];

       $data = explode(":" ,$data);
       
        $_SESSION['Price_range'] = $data;
       
       echo json_encode($data);
      
    }

}
