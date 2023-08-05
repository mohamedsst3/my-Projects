<?php 


class BlogProcess{

    private $db;
    

    public function __construct()
    {
      $this->db = Database::newgetins();
    }
    
  public function Sava_Blog_data($post, $file, $image_class, $author) {
    $dbs = $this->db;

    $error = array();
    if(isset($post['title']) && empty($post['title'])){
      $error[] =  "The Title is Empty";
    }
    if(isset($post['text']) && empty($post['text'])){
      $error[] =  "The text is Empty";
    }
    // if(count($file['image']) == 0){
    //   $error[] =  "The Image is Not Valid";
    // }
    if(count($error) == 0){
       
      $arr['url_address'] = str_to_url($post['title']);
      $arr['title'] = $post['title'];
      $arr['post'] = $post['text'];
      $arr['date'] = date("Y:m:d H-i-s");
      $arr['author'] = $author;
      $dir = "Blog_image/";
   //   $type = end(explode("/", $file['image']['type']));
      $destination = $dir . $image_class->generate_filename(20) . ".". "jpeg";
      $arr['image'] = $destination;
      
      

      $query = "INSERT INTO blogs (url_address, title, post, image, date, author) VALUES (:url_address, :title, :post, :image, :date, :author)";
      $res = $dbs->write($query, $arr);
      if($res){
        
        move_uploaded_file($file['image']['tmp_name'], $destination);
        $image_class->resize_image($destination, $destination, 1000, 1000);
        //$image_class->crop_image($destination, $destination, 1000, 700);
        return true;
      }
      return false;
    }
  }
}