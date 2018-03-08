<?php


//si l'id et le pseudo n'existent, c-a-d l'utilisateur n'est pas connecté 
  if(!isset($_SESSION['id']) && !isset($_SESSION['pseudo'])){

      header('Location: login.php');
      exit();

  }
?>