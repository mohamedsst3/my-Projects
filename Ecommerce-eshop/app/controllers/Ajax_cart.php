<?php 


class ajax_cart extends Core\Controller {


    public function add(){

        $id = $_POST['id'];

        foreach($_SESSION['CART'] as $k => $v){

            if($v['id'] == $id){
              $_SESSION['CART'][$k]['qty']++;
              break;
              
            }
        }

        echo json_encode($_SESSION['CART'][$k]);
    }

    
    public function subtract(){
        $id = $_POST['id'];
        foreach($_SESSION['CART'] as $key => $value){

            if($value['id'] == $id){
                $_SESSION['CART'][$key]['qty']--;
                break;
            }
        }
        echo json_encode($_SESSION['CART'][$key]);
    }

    public function get_total() {
        $id = $_POST['id'];
        $price = $_POST['price'];
        foreach($_SESSION['CART'] as $key => $value){

            if($value['id'] == $id){
               $_SESSION['CART'][$key]['Total'] = $price * $value['qty'];
                break;
            }
        }

        echo json_encode($_SESSION['CART'][$key]);
    }

}
