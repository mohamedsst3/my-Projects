<?php



class AddToCart{

    public function Add($rows) {

        $arr = null;
        $row = $rows[0];
        if(isset($_SESSION['CART'])){
        $ids = array_column($_SESSION['CART'], "id");
        $key = array_search($row->id, $ids);
    
    
          if($row->id == $ids){
           
            $_SESSION['CART'][$key]['id'] = $row->id;
            $qty =$_SESSION['CART'][$key]['qty']++;
          
          }else{
            $arr = null;
            $arr['id'] = $row->id;
            $arr['qty'] = 1;
           
            $_SESSION['CART'][] =  $arr;
    
          }
    
    
        }else{
          
            $arr = null;
            $arr['id'] = $row->id;
            $arr['qty'] = 1;
            $_SESSION['CART'][] =  $arr;
           
        }

        header("Location: ".ROOT."Cart");
        exit();
        }
       
      
    
    
    
}