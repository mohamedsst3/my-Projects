<?php 





class LikeButton {

    private $db;

    public function __construct()
    {
        $this->db = Database::newgetins();
    }

    public function AddLike($Blog_id, $user_id) { 
        $db = $this->db;
        $data['value'] = 1;
        $data['Blog_id'] = $Blog_id;
        $data['user_id'] = $user_id;

       
       //check if the user add like for the same Blog before
       $check = $this->GetLikesByUser($user_id,$Blog_id);
      
       if(!empty($check[0]->Likes) && $check[0]->Likes == 1) {
        $data['value'] = 0;
        $query = "UPDATE bloglikebutton SET Likes = :value WHERE Blog_id = :Blog_id AND user_id = :user_id";
       } elseif(!empty($check[0]->Likes) && $check[0]->Likes == 0){
        $data['value'] = 1;
        $query = "UPDATE bloglikebutton SET Likes = :value WHERE Blog_id = :Blog_id AND user_id = :user_id";
       }else{
        if(empty($check[0])) {
            $query = "INSERT INTO bloglikebutton (Likes, Blog_id, user_id) VALUES (:value, :Blog_id, :user_id)";
        }else{
            $data['value'] = 1;
            $query = "UPDATE bloglikebutton SET Likes = :value WHERE Blog_id = :Blog_id AND user_id = :user_id";
        }
       }

       $db->write($query, $data);
       $feedback = $this->GetLikesByBlog($Blog_id);

       $data['value'] = $data['value'] == 1 ? true : false ;
       $data['feedback'] = $feedback;
       return $data;
    
    }

    public function GetLikesByBlog($Blog_id){
        $db = $this->db;
        $data['Blog_id'] = $Blog_id;
        $result = $db->read("SELECT sum(Likes) AS value_sum FROM bloglikebutton WHERE Blog_id = :Blog_id ", $data);
        $value = 0;
        foreach($result as $final){
        $value = $final->value_sum;
        }
        return $value;
    }

    public function GetLikesByUser($user_id, $blog_id) {
        $db = $this->db;
        $data['userid'] = $user_id;
        $data['blog_id'] = $blog_id;

        $query = "SELECT * FROM bloglikebutton WHERE user_id = :userid AND Blog_id = :blog_id";

        $result = $db->read($query, $data);

        return $result;
    

    }
}