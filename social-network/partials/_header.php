<!DOCTYPE html>
<html lang="fr">
<head>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Reseaux social pour developpeur">
    <meta name="author" content="Axel MOUELE">
    <link rel="icon" href="../../favicon.ico">



    <title>

        <?=
        isset($title)
        ? $title .' - '.WEBSITE_NAME
        : WEBSITE_NAME.' - Rigueur ,Traveil ,Succès';

        ?>


    </title>

    <!-- styleSheet CSS -->

    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/readable/bootstrap.min.css" rel="stylesheet">

    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <link rel="stylesheet" href="assets/CSS/main.css">
    <link rel="stylesheet" href="assets/JS/prettify.js">
    <link rel="stylesheet" href="assets/JS/jquery.js">


  

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>



<body>

<?php include('partials/_nav.php'); ?>
<?php include('partials/_flash.php'); ?>
