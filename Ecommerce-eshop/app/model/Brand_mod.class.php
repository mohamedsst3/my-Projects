<?php


class Brand_mod{

    private $db;

    public function __construct()
    {
        $this->db = Database::newgetins();
    }

    public function Insert_Data($post) {

       
        $data['brandname'] = $post->brandname;
        $this->db->write("INSERT INTO brands (Brand_Name) VALUE (:brandname)", $data);
        
    }

    public function get_Brands(){
        
        $result = $this->db->read("SELECT * FROM brands ORDER BY id DESC");
        return $result;
    }
}