<?php

namespace Core;

class Controller {
     //final you can't edit or overwrite the method or the class or the property
    final public function view($path, $data = []){

        extract($data);
                                      
        if(file_exists( "../app/views/". $path.".php")){
            require "../app/views/" . $path .".php";
        }else{
            require "../app/views/eshop/user/404.php";

        }

    }



    final public function load_model($model, $addFirst = ""){
        $file = "../app/model/".$addFirst. ucfirst($model) .".class.php";  
        if(file_exists($file)){
          require $file;
          return  new $model();
    
       }
    
       return false;
 
    }
 

}