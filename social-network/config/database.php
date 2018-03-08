<?php

//database credentials
define('DB_HOST','localhost');
define('DB_NAME','Ax_data');
define('DB_USERNAME','root');
define('DB_PASSWORD','root');

try{

     $db = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USERNAME, DB_PASSWORD);
     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
}
catch (Exception $e)
{
     die('Erreur : ' .$e->getMessage());
}
     //$db = new PDO('mysql:host=localhost;dbname=Ax_data;charset=utf8', 'root', 'root');
?>