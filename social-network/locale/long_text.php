<?php





    $long_text = [


        'Accueil_intro' => ['fr'=>'
             <p> <?= WEBSITE_NAME  ;?> est un réseaux social de developpeurs,⌨ <br>

                Et qui dit développeur dit code source.✍<br>

                Grâce à cette plateforme, vous avez la possibilité de tisser des liens amicaux avec d\'autres développeurs.

                D\'échanger de codes sources et de recevoir de l\'aide si vous rencontrez de problèmes dans vos projets

                et bien plus encore<br>

                Alors n\'hésitez plus et <a href="register.php">rejoignez-nous maintenant dans la communauté des AxNautes..<a/>!☺ <br>
             </p>

            <a href="register.php" class="btn btn-primary btn-plg">Créer un compte<a/>',
            
            
            
            
            
            
            'en'=>'
             <p> <?= WEBSITE_NAME  ;?> is a social network for developers,⌨ <br>

                Who says developer also says source code.✍<br>

                Thanks to this platform, you have the possibility to make friend with other developers.
                 Exchange codes sources and   receive help if you face some problems in your projects 

                and more<br>

                Then do not hesitate and  <a href="register.php">join us  now in  the community of AxNautes..<a/>!☺ <br>
             </p>

            <a href="register.php" class="btn btn-primary btn-plg">Create an account<a/>'],
        

    ];


$long_text['Accueil_intro'][$_SESSION['locale']];//  remplacer le texte par ceci dans index.view.php
