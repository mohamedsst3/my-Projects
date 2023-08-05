<?php 

class Blog_mod {
    
   private $database;

   public function __construct()
   {
      $this->database = Database::newgetins();
   }
   
     public function get_blog_data(){
        $db = $this->database;
        $query = "SELECT * FROM blogs ORDER BY id DESC";
        $result = $db->read($query);
        return $result;
     }


     public function get_Blog_author($id){
        $db = $this->database;
        $arr['id'] = $id;
        $query = "SELECT * FROM users WHERE id = :id";
        $res = $db->read($query, $arr);
       
        foreach($res as $user){
        return $user->name;
      }
      
     }
}