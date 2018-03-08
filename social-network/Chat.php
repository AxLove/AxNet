<?php

            require('config/database.php');
            require('include/chat.func.php');
            require('include/functions.php');
            require('include/constant.php');
            require("BootStrap/locale.php");



    if(!isset($_GET['id']) || is_loggedin() == 0 || user_exist() != 1){
        header("Location:index.php");
    }

    $_SESSION['id'] = $_GET['id']; 


 require("views/chat.view.php");

?>
