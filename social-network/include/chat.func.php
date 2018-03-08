<?php

if(!function_exists('user_exist')) {


    function user_exist()
    {

        global $db;

        $e = array('user' => $_GET['user'], 'session' => $_SESSION['pseudo']);

        $q = $db -> prepare('SELECT * FROM users WHERE email =: user AND email != session');

        $q -> execute($e);

        $exist = $q->rowCount($q);

        return $exist;
    }


}


if(!function_exists('get_user')) {


    function get_user()
    {

        global $db;

        $q = $db -> query("SELECT * FROM users WHERE pseudo = '{$_SESSION['pseudo']}' ");

        
   $user = array();


   if($row = $q->fetchObject()){


   $user[] = $row;


   }

  return $user;

    }


}