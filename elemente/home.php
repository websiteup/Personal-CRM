<?php

// Include baza de date
 include 'clase/listaDB.php';

 $listaObj = new Intrari();
 $lista = $listaObj->afiseazaDatele();

 $titluPagina = "Prima pagina";
 require_once('header.php');
?>

	<div class="jumbotron">
		<div class="container">
			<h1 class="titlu-site">Salut, lume! </h1>
			<p> This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique. </p>
			<a class="btn btn-primary btn-lg" href="#" role="button">Learn more »</a>
		</div>
	</div>

 <div class="container">
 	<div class="row">

	<?php 
	if ($lista > 0) {
        foreach ($lista as $intrare) {
 	?>
 	<div class="col-md-4">
 	  <div class="card mb-4 box-shadow"> 

		<img alt="<?php echo $intrare['nume']; ?>" class="card-img-top" style="height: 230px; width: 100%; display: block;" src="<?php echo $intrare['imagine'] ?? "imagini/noimage.jpg" ; ?>">

		<div class="card-body">
		  <h3 class="card-title"><a href="#"><?php echo $intrare['nume']; ?></a></h3>
          <p class="card-text"><?php echo $intrare['descriere']; ?></p>

          <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
	            <a class="btn btn-primary btn-twitter btn-sm" href="https://<?php echo $intrare['website']; ?>">
	                <i class="fa fa-link" aria-hidden="true"></i>
	            </a>
	            <a class="btn btn-danger btn-sm" rel="publisher"
	               href="<?php echo $intrare['email']; ?>">
	                <i class="fa fa-envelope-o" aria-hidden="true"></i>
	            </a>
	            <a class="btn btn-primary btn-sm" rel="publisher"
	               href="<?php echo $intrare['telefon']; ?>">
	                <i class="fa fa-phone"></i>
	            </a> 
            </div>
            <small class="text-muted">9 mins</small>
          </div>
     	</div>
	    </div>
	</div>

	<?php 
			}
		}
	 ?>
 	</div>
 </div>

<?php
 require_once('footer.php');
?>