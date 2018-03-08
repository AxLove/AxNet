

<?php $title = "Chat members"; ?>

<?php include('partials/_header.php'); 
      require('include/chat.func.php'); ?>



<div id="main-content">


    <div class="container">

        <h1> Friends Chat</h1>


   <?php  foreach(get_user() as $user){ ?>

            <h2 class="header"> <?= $user->pseudo; ?></h2>

            <div class="messages-box"></div>

            <div class="bottom">
                <div class="field field-area">
                    <label for="message" class="field-label">Votre message</label>
                    <textarea name="message" id="message" rows="2" class="field-input field-textarea"></textarea>
                </div>
                <button type="submit" id="send" class="send">
                    <span class="i-send"></span>
                </button>

            </div>

     
    
 <?php  }  ?>


    </div>
</div>

<?php include('partials/_footer.php'); ?>