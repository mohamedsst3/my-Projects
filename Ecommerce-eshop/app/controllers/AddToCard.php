<?php 

class AddToCard extends Core\Controller{



    public function  index($id = ""){

    $id[1] = addslashes($id[1]);

    $arr['id'] = $id[1];
    $productModel = $this->load_model("Product_mod");
    $rows = $productModel->GetProductsById($arr['id']);

    if($rows){
      $AddToCartModel = $this->load_model("AddToCart");
      $AddToCartModel->Add($rows);
    }
  }


  
  public function  add($id = ""){
   
    $id = addslashes($id[2]);
    if(isset($_SESSION['CART'])) {
      foreach($_SESSION['CART'] as $key => $item) {
      if($item['id'] == $id){
        $_SESSION['CART'][$key]['qty']++;
      break;
      }
      }
    }
    $this->redirect();
  }


  public function  subtract($id = ""){
    $id = addslashes($id[2]);
    if(isset($_SESSION['CART'])) {
      foreach($_SESSION['CART'] as $key => $item) {
      if($item['id'] == $id){
        $_SESSION['CART'][$key]['qty']--;
        break;
      }

      }
   
    }
    $this->redirect();

  }


  public function  delete($id = ""){
  
    $id = addslashes($id[2]);
    if(isset($_SESSION['CART'])) {
      foreach($_SESSION['CART'] as $key => $item) {
      if($item['id'] == $id){
      
        //key represent the array number
        unset($_SESSION['CART'][$key]);
        $_SESSION['CART'] = array_values($_SESSION['CART']);
        show($_SESSION['CART']);
      break;
      }
      }
    }
    $this->redirect();

  }

  public function redirect(){
    header("Location:". ROOT ."Cart");
    exit();
  }

}