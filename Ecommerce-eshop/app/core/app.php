<?php

class App {

   protected $controller = "Home";
   protected $method = "index";
   protected $params;
   

   public function __construct(){
    $url = $this->parseURL();

    

   

    //Admin Configuration

    if($url[0] =="Admin"){
        $url[1] = !empty($url[1]) ? $url[1]: "";
        $file = "../app/controllers/". ucfirst($url[0]) .'/' .ucfirst($url[1]) .".php";
        require $file;
        $this->method =  !empty($url[2]) ? ucfirst($url[2]): "index";
    
        $controller =  ucfirst($url[1]);
        call_user_func_array([new $controller, $this->method], [$url]);
        die;
    }

    $file = "../app/controllers/" . ucfirst($url[0]) . ".php";

    if(file_exists($file)){
       $this->controller = $url[0];
       unset($url[0]);

       require "../app/controllers/" . ucfirst($this->controller) . ".php";
        
     
        if(isset($url[1])){
            $url[1] = strtolower($url[1]);

            //check if function can be called from this very scope  //&& is_callable([$this->controller, $url[1]])
            if(method_exists($this->controller, $url[1]) ){
               $this->method = $url[1];
                unset($url[1]);
            }
            
        }
       
    }else{
        
        require "../app/controllers/_404.php";
        $this->controller = "_404";
       
      
    }
        
    if(!empty($this->controller)){
        $controller = new $this->controller;
        //call back the function and startup the class 
       
        call_user_func_array([$controller, $this->method], [$url]);
       
        }
   }   
   

   private function parseURL(){
    
    $url = isset($_GET['url']) ? $_GET['url']  : "Home";
    
    return explode("/", filter_var(trim($url, "/"), FILTER_SANITIZE_URL));
   }
}
