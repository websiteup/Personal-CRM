<?php 

session_start(); /* Incepe sesiunea */

require_once "config/bazadedate.php";

$link = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if (!$link) {
    echo "Eroare: Nu a fost posibilă conectarea la MySQL." . PHP_EOL;
    echo "Valoarea errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Valoarea error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

echo "Succes: Conexiunea la MySQL a fost stabilită! Baza de date my_db este minunată." . PHP_EOL;
echo "Informație despre host: " . mysqli_get_host_info($link) . PHP_EOL;

mysqli_close($link);

include "clase/utilizatori_functii.php";

$utilizatoriObj = new Utilizatori();
 
/* Verifica formularul de autentificare */
//print_r($_POST);
if(isset($_POST['submit'])){
  $utilizator = $utilizatoriObj->escape_string($_POST['utilizator']);
  $parola = $utilizatoriObj->escape_string($_POST['parola']);
 
  $autentificare = $utilizatoriObj->verificaAutentificare($utilizator, $parola);
  if($autentificare === false){
    $_SESSION['eroare'] = "Numele utilizatorului sau parola sunt gresite";
    //header('location:utilizator_autentificare.php');
  } else {
    $_SESSION['utilizator'] = $autentificare;
    header('location:index.php');
  }
}

?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="elemente/style/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /
    >
    <title>Autentificare Personal CRM</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />

    <!-- CSS Files -->
    <link href="elemente/style/css/bootstrap.min.css" rel="stylesheet" />
    <link href="elemente/style/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="elemente/style/css/demo.css" rel="stylesheet" />
</head>
<body>

 <div id="login">
    <div class="container pt-5">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12 card">

                    <form action="" method="POST">
                        
                        <h3 class="text-center text-info">Autentificare</h3>
                            <?php if (isset($_SESSION['eroare']) && $_SESSION['eroare']){?>
                                <div class='alert alert-danger alert-dismissible' role="alert">
                                    <?php echo $_SESSION['eroare']; ?>
                                    <?php unset($_SESSION['eroare']); ?>
                                </div>
                            <?php } ?>
                        <div class="form-group">
                            <label for="utilizator">Utilizator:</label><br>
                            <input type="text" name="utilizator" class="form-control" value="admin">
                        </div>
                        <div class="form-group">
                            <label for="parola">Parola:</label><br>
                            <input type="password" name="parola" class="form-control" value="1234">
                        </div>
                        <div class="form-group">                            
                            <input name="submit" type="submit" class="btn btn-primary btn-fill" value="Autentificare">
                        </div>                        
                        <div class="form-group">                            
                            <span>admin / 1234</span>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

</body>
<!--   Core JS Files   -->
<script src="elemente/style/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="elemente/style/js/core/popper.min.js" type="text/javascript"></script>
<script src="elemente/style/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="elemente/style/js/plugins/bootstrap-switch.js"></script>
<script src="elemente/style/js/plugins/bootstrap-notify.js"></script>
</html>