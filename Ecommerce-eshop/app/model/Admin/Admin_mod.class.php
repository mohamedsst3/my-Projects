<?php


Class Admin_mod {

  private $db;

  public function __construct()
  {
    $this->db = Database::newgetins();
  }

    public function Admin_config(){
 
      $dbs = $this->db;
    if(isset($_SESSION['user_url'])){
     $query = "SELECT * FROM users WHERE url_address = :url LIMIT 1";
     $data['url'] = $_SESSION['user_url'];
     $results = $dbs->read($query, $data);
     if($results){
       if($results[0]->rank == "admin"){

       return $results[0];

       }else{

        return false;

       }
     }
        
    }
  
 }
 
 

  




}