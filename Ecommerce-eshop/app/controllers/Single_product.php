<?php

class Single_product extends Core\Controller{

    public function index(){
    $data = array();

    $model = $this->load_model("Single_product_mod");

    $res = $model->get_data();

    $data['product_info'] = $res;

    $data['Page_Title'] = "Product ";


    //get the Data For The Header
    $user = $this->load_model('Login_mod');
    $user_data = $user->check_login();
    if(is_object($user_data)){
    $data['user_data'] = $user_data;
    }

    $this->view("eshop/user/product-details", $data);
}
}