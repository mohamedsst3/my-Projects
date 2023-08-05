<?php 



class User {

    private $db;

    public function __construct()
    {
        $this->db = Database::newgetins();
    }

    
  public function GetId_ByUserUrl($url_address){
    $db = $this->db;
    $arr['url_address'] = $url_address;
    $query = "SELECT id FROM users WHERE url_address = :url_address LIMIT 1";
    $res = $db->read($query, $arr);
     foreach($res as $val){
     return $val->id;
     }
   
 }

    public function get_user($url){
        $dbs = Database::newgetins();
        $arr["url"] = addslashes($url);
        $query = "SELECT * FROM users WHERE url_address = :url limit 1";
        $result = $dbs->read($query, $arr);
        if(is_array($result)){
            return $result;
        }
        return false;

    }

    public function get_user_byid($id){
        $db = Database::newgetins();
        $arr['id'] = $id;
        $query = "SELECT * FROM users WHERE id = :id";
        $res = $db->read($query, $arr);

        return $res;
    
    
    }

    
    public function get_user_info($user_url){
        $db = Database::newgetins();
        $arr['url_address'] = $user_url;
        $query = "SELECT * FROM users WHERE url_address = :url_address";
        $res = $db->read($query, $arr);

        return $res;
      
     }

}