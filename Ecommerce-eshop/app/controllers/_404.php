<?php 

class _404 extends Core\Controller{
 
  public function  index(){
 

  $data['Page_Title'] = "Error 404";
   $this->view("eshop/user/404", $data);

  }

}