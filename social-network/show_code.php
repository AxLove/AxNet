


<?php


session_start();

include('filters/auth_filter.php');// seul un visiteur pour acceder a la page de login
require('config/database.php');
require('include/functions.php');
require('include/constant.php');
//require("BootStrap/locale.php");


      if(!not_empty($_GET['id'])){


          $data = find_code_by_id($_GET['id']);


          if(!$data){

          //    echo     "<script type='text/javascript'>document.location.replace('share_code.php');</script>";

           //   exit();

          }

        

        }else{


          //  echo     "<script type='text/javascript'>document.location.replace('share_code.php');</script>";

           // exit();
        }




require('views/show_code.view.php');
?>
