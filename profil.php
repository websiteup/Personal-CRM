<?php

	$titluPagina = "Prima pagina";
	require_once('elemente/header.php');

	$listaObj = new Intrari();

	// Verifica ID-ul intrarii pt. care trebuie sa fiseze intrarele
	if(isset($_GET['intrareId']) && !empty($_GET['intrareId'])) {
	    $intrareId = $_GET['intrareId'];
	    $intrare = $listaObj->afiseazaDateleByID($intrareId);
	}

 	//print_r($intrare);

	// ToDoList
	$taskuri = $listaObj->afiseazaToDoList($intrare['id']);
	print_r($taskuri);

 	// Adauga date in tabelul intrari_taskuri pt. ToDoList
	if(isset($_POST['submit'])) {
		$listaObj->introducereToDoList($_POST);
	}

	if (isset($_GET['alert']) == "adauga_task") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Task-ul a fost adaugat
            </div>";
 	}

?>
 <div class="container">
 	<div class="row">

 	<div class="col-md-4">
 	 	<div class="card mb-3 box-shadow"> 
 	 		<div class="card-body">

				<img alt="<?php echo $intrare['nume']; ?>" class="profile-img img-responsive d-block mx-auto" src="<?php echo $intrare['imagine'] ?? "imagini/noimage.jpg" ?>">

				<div class="card-text text-center"><?php echo $intrare['descriere']; ?></div>
			</div>

	    </div>
	</div>

	<div class="col-md-8">
 	  	<div class="card mb-3 box-shadow"> 

			<div class="card-body">
				<div class="profile-header">

					<div class="pull-right">
		          		<a href="profil_editare.php?modificaId=<?php echo $intrareId; ?>" class="btn btn-primary edit-profile"> <i class="fa fa-pencil-square fa-lg"></i> Modifica</a>
		          	</div>

					<div>
						<h3 class="card-title"><?php echo $intrare['nume']; ?></h3>
						<span class="text-muted"><?php echo $intrare['data_introducerii']; ?></small>
		          	</div>	          	
	          	</div>


	          	<table class="table" style="margin-top: 10px;">
				  <tbody>
				    <tr>
				      <th scope="row">Website</th>
				      <td><?php echo $intrare['website']; ?></td>
				      <td class="text-right">
					      	<a class="btn btn-info btn-sm" href="https://<?php echo $intrare['website']; ?>">
			                <i class="fa fa-link"></i></a>
			        	</td >
				    </tr>
				    <tr>
				      <th scope="row">Telefon</th>
				      <td><?php echo $intrare['telefon']; ?></td>
				      <td class="text-right">
					      	<a class="btn btn-info btn-sm" href="tel:<?php echo $intrare['telefon']; ?>">
			               <i class="fa fa-phone"></i></i></a>
			        	</td>
				    </tr>
				    <tr>
				      <th scope="row">Email</th>
				      <td><?php echo $intrare['email']; ?></td>
				      <td class="text-right">
					      	<a class="btn btn-info btn-sm" href="mailto:<?php echo $intrare['email']; ?>">
			                <i class="fa fa-envelope-o"></i></a>
			        	</td>
				    </tr>
				  </tbody>
				</table>

     		</div>
	    </div>

	    <div class="card mb-3 box-shadow">
			<div class="card-body">

				<form method="post">
					<div class="input-group mb-3">
					  <input type="text" name="task" class="form-control" placeholder="Introduce taskul" aria-label="Introduce taskul" aria-describedby="basic-addon2">
					  <input type="hidden" class="" name="id_intrare" value="<?php echo $intrare['id']; ?>">
					  <div class="input-group-append">
					    <input type="submit" name="submit" class="btn btn-primary" value="Adauga Task">
					  </div>
					</div>

					
					
				</form>	

				<table class="table">
					<tbody>
					<?php 
					if ($taskuri > 0) {
					foreach ($taskuri as $task) { ?>
					<tr>
						<td style="width: 30px;"><?php echo $task['id']; ?></td>
						<td><?php echo $task['task']; ?></td>
						<td><?php echo $task['data']; ?></td>
						<td style="width: 60px;">x</td>
					</tr>
					<?php } ?>
					<?php } ?>
					</tbody>
				</table>

			</div>
		</div>
	</div>


 	</div>
 </div>

<?php
 include 'elemente/footer.php';
?>