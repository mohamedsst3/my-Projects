<?php

function show($data) {

    echo "<pre>";
    print_r($data);
    echo "</pre>";

}

function checkmsg(){
    if(isset($_SESSION["Errors"])){
    echo $_SESSION["Errors"];
    unset($_SESSION["Errors"]);
    }
}

function numstotime($time, $ex = "ago"){

   $period = ["Year", "Month", "Day", "Hour", "Minute", "Second"];

    $now = new DateTime('now');

    $diff =  $time;

    $diff = $now->diff($diff)->format("%y %m %d %h %i %s");

    $diff = explode(" ", $diff);

    $diff = array_combine($period, $diff);

    $diff = array_filter($diff);

    $val = current($diff);

    $key = array_key_first($diff);

    if($key == "Day" && $val >= 7){
    
        $key = "Week";
        $val = floor($val / 7);
    }
    if($key == "" && $val == 0){
        $val = "";
        $key = "Now";
    }
    if($val > 1){
    $key .= "s";
    }

   return   $val . " " . $key . " " . $ex;      
    
}

function str_to_url($url){
    $url = preg_replace('~[^\\pL0-9_]+~u', '-', $url);
    $url = trim($url, '-');
    $url = iconv("utf-8", "us-ascii//TRANSLIT", $url);
    $url = strtolower($url);
    $url = preg_replace('~[^-a-z0-9]+~', '', $url);
    return $url;
}