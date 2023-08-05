<?php


Class Signup_mod {

    private $error = array();

    public function SignValidation($Post, $file, $image_class, $RandomModel){
        //database instanse 
        $dbs = Database::getins();

        $name        = trim($Post["name"]);
        $email       = trim($Post["email"]);
        $password    = trim($Post["password"]);
        $passwordTow = trim($Post["passwordTwo"]);
   
        if(!preg_match("/^[a-zA-Z]+$/i", $name)){
    
        $this->error[] = "Please Enter a Valid Name";

        }

       if(!preg_match("/^[a-zA-Z0-9_-]+@[a-zA-Z]+.(com|org|net)$/", $email)){

       $this->error[] = "Please Enter a Valid Email";

       }


       if(preg_match("/^[<>\"()]+$/", $password)){
        
        $this->error[] = "Please Enter a Valid password";
 
        }

        if(preg_match("/^[<>\"()]+$/", $passwordTow)){
        
        $this->error[] = "Please Enter a Valid password";
     
        }

       if(empty($name)){
        $this->error[] = "The Name Is Empty";
        }

       if(empty($email)){
        $this->error[] = "The email Is Empty";
        }

        if(empty($password)){
            $this->error[] = "The Password Is Empty";
        }

        if(strlen($name) < 4){
            $this->error[] = "The Name Less Than 4 keys";
        }

        if(strlen($email) < 4){
            $this->error[] = "The Email Less Than 4 keys ";
        }

        if(strlen($password) < 6){
            $this->error[] = "The Password Less Than 6 keys";
        }

        if($password !== $passwordTow){
            $this->error[] = "The Password Is Not Match"; 
        }
        if(!isset($file['user_image']) || $file['user_image']['error'] > 0){
            $this->error[] = "The Profile Image Is Empty"; 
        }

        //check if Name used before <<<<<<<<<<
        $result = null;
        $query = "SELECT * FROM users WHERE name = :name OR email = :email LIMIT 1";
        $data['name'] = $name;
        $data['email'] = $email;
        $result = $dbs->read($query, $data);

        if($result){
            $this->error[] = "The Name Is Used Before";
        }
        //end check if Name used before >>>>>>


        if(empty($this->error)){
           $rank = "customer";
           $url_address = $RandomModel->getrandomstring(10);
           $date = date("Y-m-d H-i-s");
           $type = end(explode("/", $file['user_image']['type']));
           $direcsion = "users_image/" . $image_class->generate_filename(20) .'.'. $type;;
           $image = $direcsion;
           $pass_hash = password_hash($password, PASSWORD_DEFAULT);
           $query = "INSERT INTO users (url_address, name, email, password, date, rank, image) VALUES (?, ?, ?, ?, ?, ?, ?)";
           $data = array($url_address, $name, $email, $pass_hash, $date, $rank, $image);
           $res = $dbs->write($query, $data);
           if($res){
            move_uploaded_file($file['user_image']['tmp_name'], $direcsion);
            header("Location: Login");
            exit();
           }
           
        }

        if(!empty($this->error)){
            $_SESSION["Errors"] = $this->error[0];
        }else{
            unset($_SESSION["Errors"]);
        }

        //$pssword = input value 
        //hash = password_hash($password, PASSWORD_DEFAULT)
        //password_veryfiy ($password, $value from database)
        
    }



    

}


