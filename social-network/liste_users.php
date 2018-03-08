<?php
/**
 * Created by PhpStorm.
 * User: axelmouele
 * Date: 20/05/16
 * Time: 01:28
 */

           session_start();

            require('config/database.php');
            require('include/functions.php');
            require('include/constant.php');
            require("BootStrap/locale.php");



         $q =  $db->query("SELECT id, pseudo, email FROM users ORDER BY pseudo  "); // where value = 1


    $users = $q->fetchAll(PDO::FETCH_OBJ);// recupere les donnee sous forme d'objet



require("views/list_user.view.php");

?>