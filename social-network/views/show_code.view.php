

<?php $title = "Affichage de codes sources"; ?>

<?php include('partials/_header.php'); ?>



<div id="main-content">


    <div id="main-content-share-code">
<pre class="prettyprint linenums" > <?= echapper($data->code) ;?></pre>
        <div class="btn-group nav">

            <a href="share_code.php?id= <? $_GET['id'] ?> " class="btn btn-warning">Cloner</a>
            <a href="share_code.php" class="btn btn-primary">Nouveau</a>


        </div>

    </div>



</div>











<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/JS/prettify.js"></script>

<script>

  prettyPrint();

</script>

<?php 