
<?php

session_start();
?>


<nav class="navbar navbar-inverse navbar-fixed-top">


    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">

                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand "  href="index.php" >AxNet</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">

            <ul class="nav navbar-nav " >
                <li class="<?= set_active('liste_users') ?>"> <a href="liste_users.php">Liste des utilisateurs</a></li>

            </ul>


            <ul class="nav navbar-nav  navbar-right">
                <li class="<?= set_active('index') ?>"><a href="index.php">Accueil</a></li>



                <?php if(is_loggedin()): ?>


                    <li class="dropdown">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <img src="<?= get_avatar_url($_SESSION['email']) ?>" alt="Image de profil de <?= echapper($_SESSION['pseudo']) ?>" class="img-circle">
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">

                            <li class="<?= set_active('profile') ?>"> 
                                <a href="profile.php?id=<?=get_session('id')?>">Mon profil</a>
                            </li>


                             <li class="<?= set_active('Chat') ?>">
                                <a href="Chat.php">Chat</a>
                            </li>

                            <li class="<?= set_active('share_code') ?>">
                                <a href="share_code.php">Partager</a>
                            </li>

                            <li>
                                <a href="logout.php">Deconnexion</a>
                            </li>

                        </ul>
                    </li>


                <?php else:  ?>
                <li class="<?= set_active('login') ?>"><a href="login.php">Connexion</a></li>
                <li class="<?= set_active('register') ?>"><a href="register.php">Inscription</a></li>
                <?php endif; ?>

            </ul>
        </div>
    </div>
</nav>
