<?php 

class Signup extends Core\Controller{
 
  public function  index(){

   $data['Page_Title'] = "Signup"; 
   
   //prevent Entering the Page if the user is loggedin
   $secure = $this->load_model("SecuredUrl");
   $secure->secureurl();


 
  $image = $this->load_model("image");
  if($_SERVER["REQUEST_METHOD"] == "POST"){
 
   //Signup_mod Object()
   $signup = $this->load_model("Signup_mod");
   $RandomString = $this->load_model("RandomString");
   $signup->SignValidation($_POST, $_FILES, $image,$RandomString);
   
  }
   $this->view("eshop/user/signup", $data);
  }

}