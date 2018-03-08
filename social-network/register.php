


<?php


    session_start();

    include('filters/guest_filter.php');// seul un visiteur pour acceder a la page d'inscription
    require('config/database.php');
    require('include/functions.php');
    require('include/constant.php');
   require("BootStrap/locale.php");




        //si le formulaire a été remplit
        if(isset($_POST['register'])) {

            //si tous les champs ont été remplit
            if (not_empty(['name', 'pseudo', 'email', 'password', 'password_confirm'])) {


                //extraction des données , pour qu'ils soient accessible depuis ici,(nom, pseudo...)
                extract($_POST);


                if (mb_strlen($pseudo) < 3) {
                    $errors[] = "Pseudo trop court! (minimum 3 caractères)";
                }

                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errors[] = "adresse email invalide!!";
                }

                if (mb_strlen($password) < 6) {
                    $errors[] = "Mot de passe trop court! (minimu 6 caractères)";

                } else {
                    if ($password != $password_confirm) {
                        $errors[] = "Les deux mots de passe ne concordent!";
                    }
                }

                if (is_already_used('pseudo', $pseudo, 'users')) {

                      $errors[] = "pseudonyme déjà utilisé!";

                  }
  

                if (is_already_used('email', $email, 'users')) {
                      $errors[] = "Adresse E-mail déjà utilisé! ";
                  }


                if (count($errors) == 0) {
                      //envoie email d'activation
                      $to = $email;
                      $subject = WEBSITE_NAME . " - ACTIVATION DE COMPTE";
                      $password = sha1($password);// $password = bcrypt_hash_password($password);
                      $token = sha1($pseudo . $email . $password);

                      ob_start(); // Tant qu'elle est enclenchée, aucune donnée, hormis les en-têtes, n'est envoyée au navigateur, mais temporairement mise en mémoire tampon

                      require('Templates/emails/activation.tmpl.php');//ceci n'est pas directement affiché
                      $content = ob_get_clean(); // on stocke le contenu précédent(activation.tmpl.php) dans $content
                      
                      $headers = 'MIME-Version: 1.0' . "\r\n";
                      $headers .= 'Content-type: text/html; charset = iso-8859-1 ' . "\r\n";
  
                      mail($to, $subject, $content, $headers);
                      //Informer l'utilisateur pour qu'il verifie sa boîte
                     set_flash("Mail d'activation envoyé !!", 'success'); //message flash qui ne s'affiche qu'une seule fois

                    $q =  $db -> prepare('INSERT INTO users(name,pseudo,email,password) VALUES(:name, :pseudo, :email, :password)');


                    $q->execute([
                          'name' => $name,
                          'pseudo' => $pseudo,
                          'email' => $email,
                          'password' => $password
                    ]);
                      
                    $q->closeCursor();
   
                      
                       header("location: index.php");
                      // exit();



                  }else{ save_input_data();}


            } else {


                $errors[] = "Veuillez svp remplir tout les champs!";

                save_input_data();

            }


        }else{


            clear_input_data();
        }


    require('views/register.view.php');

?>


