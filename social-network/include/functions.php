
    <?php


        // securise les données entrées par l'utilisateur
            if(!function_exists('echapper')) {


                function echapper($string)
                {

                    if ($string) {


                        return htmlspecialchars($string);

                    }

                }

            }


            //teste si les champs du formulaire ne sont pas vide
        if(!function_exists('not_empty')){


                function not_empty($fields = []){

                        if(count($fields) != 0){


                            foreach ($fields as $field){

                                if(empty($_POST[($field)]) || trim($_POST[($field)])==""){

                                        return false;

                                }


                            }

                            return true;


                        }


                }


            }



        //verifie si l'element entre dans le champs n'existe pas deja dans la BDD
         if(!function_exists('is_already_used')) {


                function is_already_used($field, $value, $table)
                {


                    global $db;

                    $q = $db->prepare("SELECT id FROM ".$table." WHERE ".$field." = ?");

                    $q->execute([$value]);

                    $count = $q->rowCount();

                    $q->closeCursor();

                    return $count;
                }

            }





        //affiche les message d'alerte temporaire
            if(!function_exists('set_flash')){


                function set_flash($message, $type='info'){


                    $_SESSION['notification']['message'] = $message;
                    $_SESSION['notification']['type'] = $type;



                }

            }




        // redirection vers une autre page
        if(!function_exists('redirect')){


            function redirect($page){

                  header('Location:'.$page);
                exit();



            }

        }



        // sauvegarde les données entree dans les champs

            if(!function_exists('save_input_data')){


                function save_input_data(){


                    foreach ($_POST as $key => $value){



                        if((strpos($key,'password'))==false){


                            $_SESSION['input'][$key] = $value;

                        }



                    }


                }

            }


        //recuperation des donnee sur les champs et stokage de maniere temporaire en SESSION
                if(!function_exists('get_input')){




                    function get_input($key){

                        if(!empty($_SESSION['input'][$key])){

                            echo echapper($_SESSION['input'][$key]);


                        }else{
                            return null;
                        }


                    }

                }



            //supprime tout les input du formilaires stokés de maniere temporaire en SESSION
                if(!function_exists('clear_input_data')) {


                    function clear_input_data()
                    {

                        if (isset($_SESSION['input'])) {


                            $_SESSION['input'] = [];

                        }

                    }

                }


        //gere l'etat actif de nos differents liens

            if(!function_exists('set_active')) {


                function set_active($file, $class = 'active')
                {

                    $page = array_pop(explode('/',$_SERVER['SCRIPT_NAME']));//récupération de l'url de la page courante
                    
                    if($page == $file.'.php'){

                        return $class;

                    }else{

                        return "";
                    }
                }

            }





// get a session value
            if(!function_exists('get_session')) {


                function get_session($key)
                {

                    if ($key) {

                        return !empty($_SESSION[$key])

                            ? echapper($_SESSION[$key])
                            : null;

                    }

                }


            }


    //find user by id

    if(!function_exists('find_user_by_id')) {


        function find_user_by_id($id)
        {

            global $db;

            $q = $db -> prepare('SELECT name, pseudo, email,city, country, twitter, github ,sex ,bio ,available_for_hiring FROM users WHERE  id =?');

            $q -> execute([$id]);

            $data = $q->fetch(PDO::FETCH_OBJ);

            $q->closeCursor();

            return $data;
        }


    }


    //find code by id

    if(!function_exists('find_code_by_id')) {


        function find_code_by_id($id)
        {

            global $db;

           $q = $db->prepare("SELECT code FROM codes WHERE id=? ");


             $q->execute([$id]);


            $data = $q->fetch(PDO::FETCH_OBJ);

            $q->closeCursor();

            return $data;
        }


    }




    //get avatar url
    if(!function_exists('get_avatar_url')) {


    function get_avatar_url($email, $size = 30)
    {

    return  "http://gravatar.com/avatar/".md5(strtolower(trim(echapper($email))))."?s=".$size."&d=mm"; //"&s = 25"
    //trim ôte les espace a gauche et a droite de la variable, strtolower: conversion en minuscule, ?s=30: size
    }


    }


    //verifie si l'utilisateur est connecté
    if(!function_exists('is_loggedin')) {


        function is_loggedin()
        {

            if(isset($_SESSION['id'])or isset($_POST['pseudo'])){


                $logged = 1;
            }else{

                $logged = 0;

            }


            return $logged;
        }


    }

    //hash password with Blowfish Algorithm

/*

    if(!function_exists('bcrypt_hash_password')) {


        function bcrypt_hash_password()
        {

            return isset($_SESSION['user_id']) or isset($_POST['pseudo']);
        }


    }*/

    ?>