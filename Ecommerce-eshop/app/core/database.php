<?php 


class Database{

    public static $con;

    public function __construct() {
        
        try{
        self::$con = new PDO(DB_type . ":host=".DB_local.";dbname=".DB_NAME."", DB_user,DB_pass);
        }catch(Exception $e) {
        die($e->getMessage());
        }
    }

    public static function getins() {
    
        if(self::$con){
            return self::$con;
        }
        
        return new self();
       
    }

    public static function newgetins() {
    
        return new self();
       
    }

    //read data (fetch)
    public function read($query, $data = []){
        
        $stmt = self::$con->prepare($query);
        $result = $stmt->execute($data);
        $fetch = $stmt->fetchAll(PDO::FETCH_OBJ);

        if($result){

            if($fetch){
                return $fetch;
            }else{
                return false;
            }

        }

        return false;
    }

    public function write($query, $data = []){
        
        $stmt = self::$con->prepare($query);
        $result = $stmt->execute($data);

        if($result){
          return true;
        }

        return false;
    }






}
