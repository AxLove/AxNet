<?php

    include 'config/database.php';
    $user = $_SESSION['id'];
    $membre = $_SESSION['pseudo'];
    $message = htmlspecialchars(trim($_POST['message']));

    $i = array(
        'sender' => $membre,
        'receiver' =>$user,
        'message'=>$message
    );

    $sql = "INSERT INTO messages(sender,receiver,message,date) VALUES(:sender,:receiver,:message,NOW())";
    $req = $db->prepare($sql);
    $req->execute($i);