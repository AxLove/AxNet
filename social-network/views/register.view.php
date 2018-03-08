

<?php $title = "Inscription"; ?>

<?php include('partials/_header.php'); ?>



<div id="main-content">


    <div class="container">

      <h1 class="lead">  Dévenez à présent membre! </h1>

        
        

        <?php include('partials/_error.php') ; ?>


      <form  data-parsley-validate method="post" action="register.php" class="well col-md-6 " autocomplete="on">

          <!-- Name field-->

        <div class="form-group">


            <label class="control-label" for="name">Nom:</label>

            <input type="text"  value="<? get_input('name') ?>" class="form-control" id="name" name="name"/>


        </div>


          <!-- pseudo field-->

          <div class="form-group">


              <label class="control-label" for="pseudo">Pseudo:</label>

              <input type="text"  value="<? get_input('pseudo') ?>"  data-parsley-minlength="3" class="form-control" id="pseudo" name="pseudo" required="required"/> <!-- parsely-minlength, exige qu'on rentre trois charactere minimum -->


          </div>


          <!-- email field-->

          <div class="form-group">


              <label class="control-label" for="email">Adresse mail:</label>

              <input type="email" data-parsley-trigger="change" value="<? get_input('email') ?>"  class="form-control" id="email" name="email" required="required"/><!-- data-parsley-trigger valide l'entrée dès qu'on change de champs, afin de vérifier automatiquement si l'adresse mail est valide ou pas-->


          </div>


          <!-- password field-->

          <div class="form-group">


              <label class="control-label" for="password">Mot de passe:</label>

              <input type="password" class="form-control" id="password" name="password" required="required"/>


          </div>


          <!-- password confirmation field-->

          <div class="form-group">


              <label class="control-label" for="password_confirm">confirmer votre mot de passe:</label>

              <input type="password" class="form-control" id="password_confirm" name="password_confirm" required="required" data-parsley-equalto="#password"/><!-- parsley vérifie que les 2 password sont identiques -->


          </div>


          <!-- register button-->

          <input  type="submit" class="btn btn-primary" value="Inscription" name="register"/>

      </form>


    </div>



</div>



<?php include('partials/_footer.php'); ?>