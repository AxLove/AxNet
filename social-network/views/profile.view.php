


<?php $title = "Page de profile";
session_start();
?>

<?php include('partials/_header.php'); ?>

<div id="main-content">


    <div class="container">

        <div class="row">


               <div class="col-md-6">
                <!-- bootstrap -->
                   <div class="panel panel-default">
                    <div class="panel-heading">
                         <h3 class="panel-tile"> Profil de <?= echapper($_SESSION['pseudo']) ?> </h3>
                    </div>

                         <div class="panel-body">

                              <div class="row">
                            <div class="col-md-5">

                                <img src="<?= get_avatar_url($user->email,100) ?>" alt="Image de profil de <?= echapper($user->pseudo) ?>" class="img-circle">

                            </div>
                              </div></br>

                             <div class="row">
                                <div class="col-sm-6">

                                <strong> <?= echapper($_SESSION['pseudo']) ?></strong><br>
                            <a href="mailto: <?= echapper($_SESSION['email']) ?>"> <?= echapper($_SESSION['email']) ?></a></br>

                                    <?='<i class="fa fa-location-arrow"> &nbsp;</i>Paris - France</br>';

                                    $user->city && $user->country ? '<i class="fa fa-location-arrow"> &nbsp;</i>'.echapper($user->city) .' - '.echapper($user->country).'</br>': '';


                                    ?><a href="https://google.com/maps?q=<? echapper($_SESSION['city']) .' '.echapper($user->country) ?>" target="_blank"> Voir sur google Maps</a>

                                </div>

                                     <div class="col-sm-6">

                                         <?='<i class="fa fa-twitter"></i> &nbsp;<a href="//twitter.com/maxlagrange">@maxlagrange</a></br>';

                                         $user->twitter ? '<i class="fa fa-twitter"> &nbsp;</i> <a href="//twitter.com/'.echapper($_SESSION['twitter']) .'">@'.echapper($_SESSION['twitter']).'</a>': '';


                                         ?>

                                         <?='<i class="fa fa-github"></i> &nbsp;<a href="//github.com/axelmouele">axelmouele</a></br>';

                                         $user->github ? '<i class="fa fa-github"></i>&nbsp; <a href="//github.com/'.echapper($user->github) .'">'.echapper($_SESSION['github']).'</a>': '';


                                         ?>


                                         <?='<i class="fa fa-male"></i>';

                                         $user->sexe=="H" ? '<i class="fa fa-male"></i>': '<i class="fa fa-female"></i>';


                                         ?>

                                         <?=

                                         $user->available_for_hiring ? 'Disponible pour emploi': 'Non disponible pour emploi';


                                         ?>

                                     </div>

                         </div>


                             <div class="row">
                                 <div class="col-md-12 well">

                                     <h5>Petite biographie de <?= echapper($_SESSION['pseudo'])?> </h5>

                                     <p>
                                         <?=

                                         $user->bio ?  nl2br(echapper($user->bio)) :' Je suis Axel Love MOUELE, Elève ingénieur de ECE Paris. Spécialisé dans le développement de logiciels embarqués et applications web..';


                                         ?>



                                     </p>
                                     </div>

                             </div>

                    </div>
                       </div >


                </div>

<?php  if(!empty($_GET['id']) && $_GET['id'] === $_SESSION['id']):  ?>
        <div class="col-md-6">

                <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-tile"> Completer mon profil</h3>
                        </div>

                        <div class="panel-body">

                            <?php include('partials/_error.php'); ?>


                            <!--data-parsley-validate:tant qu'on na pas rempli tous les champs on px pas valider-->
                            <form  data-parsley-validate method="post" action="profile.php" autocomplete="off">

                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="name"> Name<span class="text-danger">*</span></label>
                                            <input type="text" name="name" id="name" class="form-control"
                                             placeholder="<?= echapper($_SESSION['pseudo']) ?>" required = "required" value="<?= echapper($user->name) ?>">
                                             <!-- placeholder: valeur affichée par défaut-->
                                            </div>
                                        </div >

                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="city"> Ville <span class="text-danger">*</span></label>
                                            <input type="text" name="city" id="city" class="form-control"
                                                 required = "required" value="<?= echapper($user->city) ?>">

                                        </div>
                                    </div >

                                </div>





                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name"> Pays <span class="text-danger">*</span></label>
                                            <input type="text" name="country" id="country" class="form-control"
                                                   required = "required" value="<?= echapper($user->country) ?>">

                                        </div>
                                    </div >


                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="sexe"> Sexe<span class="text-danger">*</span></label>
                                        <select name="sexe" id="sexe" required="required" class="form-control">
                                            <option value ="H"   <?=
                                            $user->sexe=="H" ? "selected":""; ?> > Homme </option>
                                            <option value ="F"   <?=
                                            $user->sexe=="F" ? "selected":""; ?>> Femme </option>
                                        </select>

                                    </div>
                                   </div>
                                </div>

                                <div class="row">

                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="github"> Github </label>
                                            <input type="text" name="github" id="github" class="form-control" value="<?= echapper($user->github) ?>">

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="twitter"> Twitter</label>
                                            <input type="text" name="twitter" id="twitter" class="form-control" value="<?= echapper($user->twitter) ?>">

                                        </div>
                                    </div >

                                </div>


                                    <div class="row">
                                        <div class="col-md-12">

                                            <div class="form-group">
                                                <label for="available_for_hiring">

                                                    <input type="checkbox" name="available_for_hiring" id="available_for_hiring" >
                                                    Disponible pour emploi?
                                                </label>


                                            </div>
                                        </div >

                                    </div>


                                    <div class="row">
                                        <div class="col-md-12">

                                            <div class="form-group">
                                                <label for="bio"> Biographie <span class="text-danger">*</span></label>
                                                <textarea type="text" name="bio" id="bio"  cols="30" rows="10" required="required"
                                                class="form-control " placeholder="Je suis un amoureux de la programmation...">
                                                 <?= echapper($user->bio) ?>  </textarea>

                                            </div>
                                        </div>

                                    </div>

                                <input  type="submit" class="btn btn-primary" value="valider" name="update"/>

                            </form>
                            

                        </div>
                </div>


            </div>

 <?php endif; ?>

        </div>

    </div>
</div>

<?php include('partials/_footer.php'); ?>