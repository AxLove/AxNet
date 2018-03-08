



<?php $title = "Les utilisateurs"; ?>

<?php include('partials/_header.php'); ?>



<div id="main-content">


    <div class="container">

        <h1> Liste des utilisateurs </h1>


   <?php  foreach ($users as $user) { ?>


             <div class="user-block">   

     <a href="profile.php?id=<?= $user->id ?>">
                <img src="<?= get_avatar_url($user -> email,100) ?>" alt=" <?= echapper($user->pseudo) ?>" class="img-circle">  
      </a>
                <h4 class="user-block-username">  

          <a href="profile.php?id=<?= $user->id ?>">
                 <?= echapper($user->pseudo) ?>  
                  </a>

                 </h4>  

            </div>
 <?php  }  ?>




    </div>
</div>

<?php include('partials/_footer.php'); ?>