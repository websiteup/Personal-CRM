<?php 

ob_start(); // rezolva eroare header already sen

include "clase/clienti_functii.php";
include "clase/proiecte_functii.php";
include "clase/note_functii.php";
include "clase/contoare_functii.php";

// As putea sa folosesc functia autoloader, poate pe viitor
// vezi aici https://www.brainbell.com/php/auto-loading.html

session_start(); // incepe sesiunea pentru notificari si sistemul de autentificare


// Autenficare si Dezauntetificare

if (!isset($_SESSION['utilizator']) || (trim ($_SESSION['utilizator']) == '')){
    header('location:utilizator_autentificare.php');
}

?>

<!DOCTYPE html>

<html lang="ro">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="elemente/style/img/apple-icon.png">
    <link rel="icon" type="image/png" href="elemente/style/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /
    >
    <title><?php echo $titluPagina ?></title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />

    <!-- CSS Files -->
    <link href="elemente/style/css/bootstrap.min.css" rel="stylesheet" />
    <link href="elemente/style/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="elemente/style/css/demo.css" rel="stylesheet" />
    <link href="elemente/style/css/style.css" rel="stylesheet" />

    <script src="//cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>


</head>

<body>
    <div class="wrapper">
        
<?php require_once "elemente/meniu-stanga.php"; ?>
<?php require_once "elemente/meniu-top.php"; ?>

    <div class="content">
    <div class="container-fluid">

 <?php if(isset($_SESSION['notificare']) && $_SESSION['notificare']){ ?>
        <div class='alert alert-success alert-dismissible' role="alert">
            <?php echo $_SESSION['notificare']; ?>
            <?php unset($_SESSION['notificare']); ?>
        </div>
<?php } elseif (isset($_SESSION['eroare']) && $_SESSION['eroare']){?>
    <div class='alert alert-danger alert-dismissible' role="alert">
            <?php echo $_SESSION['eroare']; ?>
            <?php unset($_SESSION['eroare']); ?>
        </div>
<?php } ?>
<?php print_r($_SESSION); ?>