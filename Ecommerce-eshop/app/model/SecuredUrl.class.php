<?php



class SecuredUrl {

    public  function secureurl(){
        if(!empty($_SESSION["user_url"])){
        if(isset($_GET["url"]) && $_GET['url'] == "Signup" || $_GET['url'] == "Login" ){
        header("Location: Home");
        exit();
        }
     }
    }
    
}