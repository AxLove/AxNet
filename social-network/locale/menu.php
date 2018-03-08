<?php




    $menu = [


       'Accueil' => ['fr'=>'Accueil', 'en'=>'Home'],

        'Connexion' => ['fr'=>'Accueil', 'en'=>'log in'],

        'Inscription' => ['fr'=>'Inscription', 'en'=>'Register'],

        'mon_profil' => ['fr'=>'Mon profil', 'en'=>'My account'],

        'share_code' => ['fr'=>'Partager', 'en'=>'Share'],

        'Deconnexion' => ['fr'=>'Déconnexion', 'en'=>'log out'],




    ];


     $menu['Accueil'][$_SESSION['locale']];// à mettre dans le fichier nav à la place de profil, connexion etc.. et remplacer accueil par ce qui correspond
