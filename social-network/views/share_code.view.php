

<?php $title = "Partage de codes sources"; ?>

<?php include('partials/_header.php'); ?>



<div id="main-content">


    <div id="main-content-share-code">

        <form action="share_code.php" autocomplete="off">

             <textarea  name="code" id="code" placeholder="Entrer votre code ici..." required="required"><?= echapper($code);?></textarea>

            <div class="btn-group nav">

                <a href="share_code.php" class="btn btn-danger">Tout effacer!</a>
                <input  type="submit" class="btn btn-success" value="Enregistrer" name="save"/>

            </div>



        </form>

    </div>



</div>


<script src="assets/js/bootstrap.min.js"></script>




<script>

    $("#code").height( $(window).height - 30);


</script>

<?php include('partials/_footer.php'); ?>