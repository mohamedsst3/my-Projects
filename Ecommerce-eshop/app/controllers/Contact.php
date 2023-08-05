<?php 

class Contact extends Core\Controller {

    public function index() {

        $data['Page_Title'] = "Contact Us";
        $user = $this->load_model('Login_mod');
        $user_data = $user->check_login();
      
      
        if(is_object($user_data)){
          $data['user_data'] = $user_data;
        }
        
        $this->view("eshop/user/Contact", $data);
    }
}