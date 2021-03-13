
<?php include "clase/functii.php"; ?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
  	<meta http-equiv="x-ua-compatible" content="ie=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?php echo $titluPagina ?></title>

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <link rel="stylesheet" type="text/css" href="elemente/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="elemente/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="elemente/css/style.css?v=1.0">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <style type="text/css">
        .wrapper{
            width: 1000px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>

<header>
	<!-- A grey horizontal navbar that becomes vertical on small screens -->
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
		<a class="navbar-brand  mr-auto" href="#">DevList Project</a>
		  <ul class="navbar-nav">
		    <li class="nav-item active">
		      <a class="nav-link" href="index.php">Acasa</a>
		    </li>
		    <li class="nav-item">
		      <a class="nav-link" href="lista.php">Lista</a>
		    </li>
		  </ul>
	</nav>
</header>

<body>