

<?php $title = "Connexion"; 
?>

<?php include('partials/_header.php'); ?>



    <div id="main-content">


        <div class="container">

            <h1 class="lead">  Connexion </h1>




            <?php include('partials/_error.php') ; ?>



            <form  data-parsley-validate method="post" action="login.php" class="well col-md-6 " autocomplete="off">

                <!-- identifiant field-->

                <div class="form-group">



                    <label class="control-label" for="pseudo">pseudo:</label>

                    <input type="text"  value="<? get_input('pseudo') ?>"  data-parsley-minlength="3" class="form-control" id="pseudo" name="pseudo" required="required"/>


                </div>



                <!-- password field-->

                <div class="form-group">


                    <label class="control-label" for="password">Mot de passe:</label>

                    <input type="password" data-parsley-minlength="6" class="form-control" id="password" name="password" required="required"/>


                </div>




                <!-- register button-->

                <input  type="submit" class="btn btn-primary" value="Connexion" name="login"/>

            </form>


        </div>



    </div>



<?php include('partials/_footer.php'); ?>