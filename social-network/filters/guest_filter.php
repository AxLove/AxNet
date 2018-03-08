



<?php

// si l'utilisateur est connecté(visiteur)
if(isset($_SESSION['id']) && isset($_SESSION['pseudo'])){


    header('Location: profile.php');
    exit();

}
?>