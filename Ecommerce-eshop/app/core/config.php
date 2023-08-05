<?php
ini_set("memory_limit","256M");
define("WEBSITE_TITLE", "MY SHOP");
define("THEME", "eshop/");


//database name
define('DB_NAME', "echop_db");
define('DB_user', "root");
define('DB_pass', "");
define('DB_local', "localhost");
define('DB_type', "mysql");


$root  = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF'];
$root = str_replace('index.php' ,"", $root);

define("ROOT", $root);

define("ASSETS", $root."assets/");


define("DEBUG", true);

if(DEBUG){
    ini_set('display_errors', 1);
}else{
    ini_set('display_errors', 0);

}