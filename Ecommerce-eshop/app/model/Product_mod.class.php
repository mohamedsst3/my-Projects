<?php

class Product_mod  extends Database{


    private $db;
            
        public function __construct()
        {
            $this->db = Database::newgetins();
        }

    public function create($data, $Files, $image_class = null) {
        $_SESSION['Errors'] = "";

        $arr = array();

        $db =  $this->db;

        $arr['description'] = $data->desc;

        $arr['price'] = $data->price;
 
        $arr['quantity'] = $data->quantity;

        $arr['category'] = $data->category;

        $arr['user_url'] =  $_SESSION["user_url"];
        
        $arr['date'] = date('Y-m-d H:i:s');

        $arr['slag'] = str_to_url($data->desc);

        
        if(!preg_match("/^[a-zA-Z-\s]+$/", $arr['description'])) {
            $_SESSION['Errors'] .= "Please Put A Valid description for Product";
        }
        if(!is_numeric($arr['price'])) {
            $_SESSION['Errors'] .= "Please Put A Valid Price for Product";
        }
        if(!is_numeric($arr['quantity'])) {
            $_SESSION['Errors'] .= "Please Put A Valid quantity for Product";
        }
        if(!is_numeric($arr['category'])) {
            $_SESSION['Errors'] .= "Please Put A Valid Category for Product";
        }
        if($this->check_slag($arr['slag'])){
            $_SESSION['Errors'] .= "The Description is used before";
        }


        $alwoed[] = "image/jpeg";
        $alwoed[] = "image/jpg";
        $alwoed[] = "image/png";
        $alwoed[] = "image/jfif";
        $alwoed[] = "image/gif";

        $arr['image2'] = "";
        $arr['image3'] = "";
        $arr['image4'] = "";
    

        $size = 10;
        $size = ($size * 1024 * 1024);
 
        $dir = "upload/";
        if(!file_exists($dir)){
            mkdir($dir, 0777, true);
        }

        foreach($Files as $key => $image_row){

        if($image_row['error'] == 0 && in_array($image_row['type'], $alwoed)){

        if($image_row['size'] < $size){

            $destination = $dir .$image_class->generate_filename(40) .".jpg";
            move_uploaded_file($image_row['tmp_name'], $destination);
            $arr[$key] = $destination; 
            $image_class->resize_image($destination, $destination, 1500, 1500);

        }
        else{
            $_SESSION['Error'] = "The Size is Bigger Than 10m";
        }
        }
        }

        if($_SESSION['Errors'] == ""){

            $query = "INSERT INTO products (description, price, quantity, category, user_url, date, slag, image, image2, image3, image4) VALUES (:description, :price, :quantity, :category, :user_url, :date, :slag, :image, :image2, :image3, :image4)";

           $check = $db->write($query, $arr);

           if($check){

          return "Done!";

          }

        return false;
      }
        
    }

    public function check_slag($data) {
     $db =  $this->db;

      $arr = array();

      $arr['slag'] = $data;

     $query = "SELECT * FROM products WHERE slag = :slag";
     
     $res = $db->read($query, $arr);
     if($res){
        return true;
     }else{
        return false;
     }
    }

    public function Edit($data, $File, $image_class) {

        $arr = array();
        $_SESSION['Errors'] = "";

        $arr = array();

        $db =  $this->db;

        $arr['description'] = $data->desc;

        $arr['price'] = $data->price;
 
        $arr['quantity'] = $data->quantity;

        $arr['category'] = $data->category;

        $arr['user_url'] =  $_SESSION["user_url"];


        $arr['id'] = $data->id;
        
        $arr['date'] = date('Y-m-d H:i:s');

        if(!preg_match("/^[a-zA-Z]+$/", $arr['description'])) {
            $_SESSION['Errors'] .= "Please Put A Valid description for Product";
        }
        if(!is_numeric($arr['price'])) {
            $_SESSION['Errors'] .= "Please Put A Valid Price for Product";
        }
        if(!is_numeric($arr['quantity'])) {
            $_SESSION['Errors'] .= "Please Put A Valid quantity for Product";
        }
        if(!is_numeric($arr['category'])) {
            $_SESSION['Errors'] .= "Please Put A Valid Category for Product";
        }


        $alwoed[] = "image/jpeg";
        $alwoed[] = "image/jpg";
        $alwoed[] = "image/png";
        $alwoed[] = "image/jfif";
        $alwoed[] = "image/gif";
        
        //uf the image 234 not inserted will put a empty value
        $arr['image2'] = "";
        $arr['image3'] = "";
        $arr['image4'] = "";

        $size = 10;
        $size = ($size * 1024 * 1024);
 
        $dir = "upload/";
        if(!file_exists($dir)){
            mkdir($dir, 0777, true);
        }

        foreach($File as $key => $image_row){

        //$key = image or image2 ..
        //$image_row =   ["name"]=> string(50) "Formex_Essence_LEGGERA_Automatic_Chronometer_1.jpg" etc...

        if($image_row['error'] == 0 && in_array($image_row['type'], $alwoed)){
        if($image_row['size'] < $size){
        $destination = $dir . $image_class->generate_filename(36) . ".jpg";
        move_uploaded_file($image_row['tmp_name'], $destination);
        $arr[$key] = $destination; //$arr['image'] = "upload/name....
        $image_class->resize_image($destination, $destination, 1500, 1500);

        }
        else{
            $_SESSION['Error'] = "The Size is Bigger Than 10m";
        }
        
        }

        }

       
        if($_SESSION['Errors'] == ""){
           $query = "UPDATE products SET description = :description, price = :price, quantity = :quantity, category = :category, image = :image, user_url = :user_url, date = :date, image2 = :image2, image3 = :image3, image4 = :image4 WHERE id = :id";

           $check = $db->write($query, $arr);

           if($check){

          return "Done!";

          }

        return false;
      }
        
    }

    public function delete($data) {
        $db =  $this->db;

        $arr['id'] = $data->id;

        $query = "DELETE FROM products WHERE id = :id";

        $db->write($query, $arr);

    }


    public function GetProducts($limit = 10, $offset = 0) {

        $db =  $this->db;

        return $db->read("SELECT * FROM products ORDER BY id DESC LIMIT $limit OFFSET $offset");

    }

  

    /**
     * get Products by search input 
     */

    public function GetProducts_BySearch($search) {

        $db = $this->db;
        $arr['search'] = "%".$search."%";
        $query = "SELECT * FROM products WHERE description LIKE :search";
        $data = $db->read($query, $arr);

        return  $data;

    }



    public function get_three_Products() {
        $db =  $this->db;
        $query = "SELECT * FROM products WHERE rand() ORDER BY id DESC LIMIT 3";
        $results = $db->read($query);
        return $results;
    }

    public function get_three_Products_DESC() {
        $db =  $this->db;
        $query = "SELECT * FROM products WHERE rand()  ORDER BY id ASC LIMIT 3";
        $results = $db->read($query);
        return $results;
    }

   

    public function get_all_byprice_range($price_range) {
        $db = Database::newgetins();
        $data['one'] = 0;
        $data['two'] = $price_range[1];
        
        $query = "SELECT * FROM products WHERE price BETWEEN :one AND :two";
        return $db->read($query, $data);
        
    }


    public function GetProductsByCategory($category){
        $db = $this->db;
        
        $arr1['category'] = lcfirst($category);

        $query1 = "SELECT * FROM categories WHERE category = :category";

        $data = $db->read($query1, $arr1);

        $arr['id'] = $data[0]->id;

        $query2 = "UPDATE categories SET views = views +1 WHERE id = :id";
        $db->write($query2, $arr);


        $query= "SELECT * FROM products WHERE category = :id";
        $resluts = $db->read($query, $arr);

        return $resluts;
    }



    public function GetProductsById($id){
        $db = $this->db;

        $arr['id'] = $id;
        $query= "SELECT * FROM products WHERE id = :id";
        $resluts = $db->read($query, $arr);

        return $resluts;
    }

}
