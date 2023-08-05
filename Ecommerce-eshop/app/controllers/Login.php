<?php 

class Login extends Core\Controller{
 
  public function  index() {
  
   $data['Page_Title'] = "Login"; 
  
   //prevent Entering the Page if the user is loggedin
   $secure = $this->load_model("SecuredUrl");
   $secure->secureurl();

   if($_SERVER["REQUEST_METHOD"] == "POST"){
    $Log = $this->load_model("Login_mod");
    $Log->Login_func($_POST);
   }



   $data['Page_Title'] = "Login";
      
   $this->view("eshop/user/login", $data); 

  }


}