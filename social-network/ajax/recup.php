<?php

    include 'config/database.php';
    $user = $_SESSION['id'];
    $membre = $_SESSION['pseudo'];

    $req = $db->query("SELECT * FROM messages WHERE (sender='$membre' AND receiver='$user') OR (receiver='$membre' AND sender='$user')");
    $results = array();

    while($rows = $req->fetchObject()){
        $results[] = $rows;
    }

    foreach($results as $message){
        ?>
            <div class="message <?php echo ($message->sender == $membre) ? 'message-membre' : 'message-user' ?>">
                <?= $message->message ?>

            </div>
            <br/><br/>

        <?php
    }