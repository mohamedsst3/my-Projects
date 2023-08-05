<?php 

class Page {

    public function __construct() {
        
    }

    public static function links($type) {

    }

    public static function get_pagination() {

        $links = (object)[];
        $page_number = isset($_GET['pg']) ? (int)$_GET['pg']: 1;
        $page_number = $page_number < 1 ? 1 : $page_number ;

        $next_page =  $page_number < 3 ? $page_number + 1 : 3;
        $prev_page = $page_number > 1 ? $page_number - 1 : 1; 
   
        $query_string = str_replace("url=", "", $_SERVER['QUERY_STRING']);
     
        $current_link = ROOT . $query_string;
        if(!strstr($query_string, "pg=")){
            $current_link .= "&pg=1";
         }

        $links->pg = isset($_GET['pg']) ? $_GET['pg'] : 1;

        $links->Next =  preg_replace("/pg=[^&?=]+/", "pg=".$next_page, $current_link);
        
        $links->prev = preg_replace("/pg=[^&?=]+/", "pg=".$prev_page, $current_link);
        return $links;
    }
}

