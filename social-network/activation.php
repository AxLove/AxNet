<?php

        session_start();
        include('filters/guest_filter.php');// seul un visiteur pourra acceder a la page d'activation
        require('config/database.php');
        require('include/functions.php');

          if(!empty($_GET['p']) && is_already_used('pseudo',$_GET['p'], 'users') && !empty($_GET['token'])){

              $pseudo = $_GET['p']; //p: pseudo
              $token = $_GET['token']; //token, sha1(pseudo.email.password)

              $q = $db->prepare("SELECT email, password FROM users WHERE pseudo = ?");
              $q->execute([$pseudo]); //pseudo = ? pour éviter les injection sql
              $data = $q->fetch(PDO::FETCH_OBJ);
              $token_verif = sha1($pseudo . $data->email . $data->password);
              $q->closeCursor();// tjr fermer le cursor apres une requete de selection, libère la mémoire du serveur


              if($token==$token_verif){

                  $q = $db->prepare("UPDATE users SET active='1' WHERE pseudo = ?");
                  $q->execute([$pseudo]);
                  $q->closeCursor();
                  //redirect('login.php');
                  set_flash('votre compte a bel et bien été activé, nous vous remercions :) ', 'success');

              }else{

                  set_flash('parametres invalides','danger');
                  redirect('index.php');

              }


          }

          include('partials/_flash.php');
