<?php 

class Countries {

  private $database;

  public function __construct()
  {
    $this->database = Database::newgetins();
  }

    public function get_countries(){

     $db = $this->database;

     $query = "SELECT * FROM countries ORDER BY id DESC";

     return $db->read($query);
     
    }

    public function get_states($id, $keyToReturn = null){
        $db = $this->database;
        $arr['id'] = (int)$id;
        $query = "SELECT * FROM states WHERE parent = :id LIMIT 1";
        $res = $db->read($query, $arr);
        if($keyToReturn != null){
         foreach($res as $info){
            return $info->$keyToReturn;
         }
        }else
        return $res;
    }



    public function get_country_byid($id){
        
        $db = $this->database;
        $arr['id'] = $id;
        $query = "SELECT * FROM countries WHERE id = :id LIMIT 1";
   
         $rs = $db->read($query, $arr);
       
         foreach($rs as $key){
           return $key->country;
         } 
        
       }
    
   
}