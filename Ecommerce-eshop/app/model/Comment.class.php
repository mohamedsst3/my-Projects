<?php 



class Comment {


    private $database;


    public function __construct()
    {
        $this->database = Database::newgetins();
    }


    public function Save_Comments($user_url, $comment, $blog, $UserModel){
        $db = $this->database;
        $arr['comment'] = $comment;
        $arr['Blog'] = $blog;
        $arr['date'] = date("Y:m:d H-i-s");
        $user_data = $UserModel->get_user_info($user_url);
        foreach($user_data as $user){
           $val = $user->id;
        }
        $arr['user_id'] = $val;
        $query = "INSERT INTO comments (user_id, comment, Blog, date) VALUES (:user_id, :comment, :Blog, :date)";
       $reslt = $db->write($query, $arr);
       if($reslt){
        return true;
       }
    }

    public function Get_Comment($blog, $UserModel){
        $db = $this->database;
        $arr['Blog'] = $blog;
        $query = "SELECT * FROM comments WHERE Blog = :Blog ORDER BY id DESC";
        $result = $db->read($query, $arr);

        //Set Name from users by user_id in comments
        if(!empty($result)){
        foreach($result as $key => $value){
        $user = $UserModel->get_user_byid($value->user_id);
        $result[$key]->name = $user[0]->name;
        $result[$key]->image = $user[0]->image;
        }
        return $result;
      }
      
    }


}