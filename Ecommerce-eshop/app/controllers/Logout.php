<?php

class logout extends Core\Controller{


   public function index() {

  
   unset($_SESSION['user_url']);


   header("Location: Login");
   exit;
   
   }
}