<?php



class FrontWebImage_model {


    private $db;


    public function __construct()
    {
        $this->db = Database::newgetins();
    }


    public function AddImage($data, $file, $image){
    

      
  
        if(isset($file['image']['name'])){
          
          
         $type = explode("/", $file['image']['type']);
    
         $type = end($type);
    
    
          $destination = "slider_image/" . $image->generate_filename(20);
    
    
        if(count($data) > 0) {
          $dbs = $this->db;
    
          if(!empty($data['header1_text']) && !empty($data['header2_text']) && !empty($data['text'])) {
    
          $arr['header1_text'] = $data['header1_text'];
          $arr['header2_text'] = $data['header2_text'];
          $arr['text'] = $data['text'];
       
          $arr['image'] = $destination . ".". $type;
    
          $query = "INSERT INTO slider_images (header1_text, header2_text, text, image) VALUES (:header1_text, :header2_text, :text, :image)";
    
          $result = $dbs->write($query, $arr);
    
          if($result){
            move_uploaded_file($file['image']['tmp_name'], $destination . "." . $type);
            return true;
          }else{
            return false;
          }
        } else{
          echo "Please Fill All THe Input";
        }
    
        }
       }
    }


    public function get_ImageSlider_data(){
      $dbs = $this->db;
  
      $query = "SELECT * FROM slider_images ORDER BY id DESC";
  
      $val = $dbs->read($query);
  
      if($val){
      return $val;
      }else{
      echo "Error";
      }
    }
}