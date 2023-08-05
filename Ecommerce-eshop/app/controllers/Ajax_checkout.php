<?php


class Ajax_checkout extends Core\Controller {

    public function index() {

       $country = $_POST['country'];

       if($_POST['data_type'] == "select_states"){

        $cls = $this->load_model("checkout_mod");

        $data = $cls->get_state($country);
      
        $info = (object)[];
        $info->data = $data;
       
       echo json_encode($data);
      }
    }

}
