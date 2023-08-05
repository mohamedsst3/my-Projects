<?php




class RandomString {



    public function getrandomstring($length){
        $text = "";
        $mer = array();
        $leters = range("a", "z");
        $Uleters = range("A", "Z");
        $nums = range(0, 9);
       foreach($leters as $lt){
        $mer[] = $lt;
       }
       foreach($Uleters as $Ul){
        $mer[] = $Ul;
       }
       foreach($nums as $num){
        $mer[] = $num;
       }
        $length = 11;
        $length = rand(6, $length);
    
        for($i = 0; $i < $length; $i++){
            $random = rand(0, 61);
            $text .= $mer[$random];
        }

        return $text;
    }
}