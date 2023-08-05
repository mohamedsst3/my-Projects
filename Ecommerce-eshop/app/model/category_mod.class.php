<?php

class category_mod extends Database{


    private $database;

    public function __construct()
    {
        $this->database = Database::newgetins();
    }

    



    public function create($data) {
        $_SESSION['Errors'] = "";

        $db = $this->database;

        $arr['category'] = $data->category;
        $arr['parent'] = $data->parent;

        if(!preg_match("/^[a-zA-Z \s]+$/", $arr['category'])){
            $_SESSION['Errors'] = "Please Put A Valid Name";
        }

     

        if($_SESSION['Errors'] == ""){
            $query = "INSERT INTO categories (category, parent) VALUES (:category, :parent)";
            $check = $db->write($query, $arr);
           if($check){
            return true;
           
        }
        return false;
      }
        
    }

    public function Edit($data) {
        $db = $this->database;
        $arr['category'] = $data->category;
        $arr['parent'] = $data->parent;
        $arr['id'] = $data->id;
        $query = "UPDATE categories SET category = :category, parent = :parent WHERE id = :id";
        $db->write($query, $arr);

    }

    public function delete($data) {
        $db = $this->database;
        $arr['id'] = $data->id;
        $query = "DELETE FROM categories WHERE id = :id";
        $db->write($query, $arr);

    }

    public function get_all() {
        $db = $this->database;
        return $db->read("SELECT * FROM categories ORDER BY views DESC");
    }

    
  


    public function GetCategoryById($cat){
        $db =  $this->database;

        $arr['cat'] = $cat;

        $res = $db->read("SELECT * FROM categories WHERE id = :cat", $arr);

        return $res;

    }

   


}