


<?php


session_start();

include('filters/auth_filter.php');// seul un visiteur pour acceder a la page de login
    require('config/database.php');
    require('include/functions.php');
    require('include/constant.php');

require("BootStrap/locale.php");






    if(not_empty($_GET['id'])){


    $data = find_code_by_id($_GET['id']);



         if(!$data){



             $code="";


         } else{


            $code = $data->code;

         }



        }  else{


            $code="";

        }






if(isset($_POST['save'])){



    if (not_empty(['code'])){


        extract($_POST);


        // on se connecte à MySQL
        $q = $db->prepare("INSERT INTO codes(code) VALUE (:code) ");


        $success = $q->execute([$code]);

              if($success){
            //afficher le code source


                  $id = $db->lastInsertId();

                  echo $id;

                     header("location: show_code.php");

              }else{

                  set_flash("Erreur lors de l'ajout du code source. Veuillez réessayer svp;",'danger');
                  echo        header("location: share_code.php");

                  exit();
              }

    }
      else{


         header("location: share_code.php");

  

      }

}









require('views/share_code.view.php');

?>