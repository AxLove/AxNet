<?php

session_start();

include('filters/auth_filter.php');// ce fichier doit tjr être apres le session_start
require('config/database.php');
require('include/functions.php');
require('include/constant.php');
require("views/profile.view.php");
require("BootStrap/locale.php");



if(!empty($_GET['id'])){

    $user = find_user_by_id($_GET['id']);


    //si aucun user n'a cet id dans la bdd
    if(!$user){

  redirect('index.php');

    }


}else{

   redirect('profile.php?id= ' . get_session('id'));
}





//si le formulaire a été remplit
if(isset($_POST['update'])){

    $errors=[];

    //si tous les champs ont été remplit
    if (not_empty(['name', 'city', 'country', 'sexe', 'bio'])) {
        

        //extraction des données , pour qu'ils soient accessible depuis ici,(nom, pseudo...)
        extract($_POST);


        // on se connecte à MySQL
        $q = $db->prepare("UPDATE users SET name = :name, city = :city, country = :country, sexe =: sexe, github = :github,

         twitter = :twitter, available_for_hiring = :available_for_hiring, bio = :bio WHERE  id = :id  ");




        $q->execute([

            'name' => $name,
            'city' => $city,
            'country' => $country,
            'sexe' => $sexe,
            'github' => $github,
            'available_for_hiring' => !empty($available_for_hiring) ?'1' : '0',
            'bio' => $bio,
            'id' =>  $_SESSION['id']



        ]);
        $user = $q->fetch(PDO::FETCH_OBJ);

        $_SESSION['twitter'] = $user->twitter;
        $_SESSION['github'] = $user->github;

        $_SESSION['city'] = $user->city;

        $_SESSION['country'] = $user->country;
        $_SESSION['bio'] = $user->bio;

        $_SESSION['available_for_hiring'] = $user->available_for_hiring;


        set_flash("Félicitation, votre profil a été mis à jour !!",'success');

         header("location: profile.php?id=".get_session('id'));
       
         exit();

    } else {


        save_input_data();
        $errors[]="Veuillez remplir tous les champs marqués par une (*)";
    }

} else {


    clear_input_data();
}



?>