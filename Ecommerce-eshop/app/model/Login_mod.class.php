<?php


Class Login_mod {
    

    private $error = array();

    private $database;


    public function __construct()
    {
        $this->database = Database::newgetins();
    }

    
    public function Login_func($Post){ 
        
        $name = trim($Post["name"]);
        $password = trim($Post["password"]);
 
        if(!preg_match("/^[a-zA-Z]+$/i", $name)){
    
        $this->error[] = "Please Enter a Valid Name";

        }

       if(preg_match("/^[<>\"()]+$/", $password)){
        
        $this->error[] = "Please Enter a Valid password";
 
        }

       if(empty($name)){
        $this->error[] = "The Name Is Empty";
        }

        if(strlen($name) < 4){
            $this->error[] = "The Name Less Than 4 keys";
        }

        if(strlen($password) < 6){
            $this->error[] = "The Password Less Than 6 keys";
        }
        

     
        /**
         * get the url_address to but it in the session & check if the user loged in 
         * get the password to verify it
         */
        if(empty($this->error)){
            $dbs = $this->database;
        $query = "SELECT password, url_address, id FROM users WHERE name = ?  LIMIT 1";

        $data = [$name];

        $result = $dbs->read($query, $data);

        $pass_v = password_verify($password, $result[0]->password);

        if($pass_v){
            $_SESSION["user_url"] = $result[0]->url_address;
            $_SESSION['user_id'] = $result[0]->id;
            header("Location: Home");
            exit();
        }else{
            $this->error[] = "The Password Is Incorrect";
        }

        }

        if(!empty($this->error)){
            $_SESSION["Errors"] = $this->error[0];
        }
           
    }

    public function check_login(){
        $dbs = $this->database;
        if(isset($_SESSION["user_url"])){
            $arr["url"] = $_SESSION['user_url'];
            $query = "SELECT * FROM users WHERE url_address = :url limit 1";
            $result = $dbs->read($query, $arr);
            if(is_array($result)){
                return $result[0];
            }
            return false;
        }
    }
     

}
