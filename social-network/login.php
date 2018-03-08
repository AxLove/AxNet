


<?php


        session_start();
        include('filters/guest_filter.php');// seul un visiteur pour acceder a la page de login
        require('config/database.php');
        require('include/functions.php');
        require('include/constant.php');

        require("BootStrap/locale.php");





        //si le formulaire a été soumit
        if(isset($_POST['login'])) {

            //si tous les champs ont été remplit
            if (not_empty(['pseudo', 'password'])) {

                //extraction des données , pour qu'ils soient accessible depuis ici,(nom, pseudo...)
                extract($_POST);

                // on se connecte à MySQL
                $q = $db->prepare("SELECT id, pseudo, email FROM users 
                            WHERE (pseudo= :pseudo )       
                            AND (password= :password) AND (active = '1') "); // remettre active ='1' OR email= :identifiant
                
                $q->execute([

                     'pseudo' => $pseudo,
                     'password' => sha1($password)

                 ]);

                $userHasBeenFound = $q->rowCount();//retourne le nombre d'utilisateur ayant les coordonnées soumit

                if($userHasBeenFound==1){

                  //FETCH_OBJ permet d'utilise la syntaxe $user->id au lieu de $user['id']
                   $user = $q->fetch(PDO::FETCH_OBJ);// recupere les donnee sous forme d'objet
                   $_SESSION['id'] = $user->id;
                   $_SESSION['pseudo'] = $user->pseudo;
                   $_SESSION['email'] = $user->email;

                   // die($user->pseudo); affiche la variable recupere dans la base de données
                    //header('Location:profile.php?id='.$user->id);
                    //redirect('profile.php?id='.$user->id);

                }else{

                    set_flash('combinaison: password/identifiant, incorrect','danger');
                    save_input_data();// s'il re-essaie de se connecter, son id champ sera prérempli.

                }

                $q->closeCursor();

            } else {

                clear_input_data();
            }

        }
        require('views/login.view.php');

?>


