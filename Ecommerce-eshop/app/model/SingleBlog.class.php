<?php 


class SingleBlog {



    public function get_single_blog($url){
        $db = Database::newgetins();
        $arr['url_address'] = $url;
        $query = "SELECT * FROM blogs WHERE url_address = :url_address LIMIT 1";
        $res = $db->read($query, $arr);
        if($res){
            return $res[0];
        }
    
    }

   
}