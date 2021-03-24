<?php

	$titluPagina = "Pagina proiect";
	require_once('elemente/header.php');

	$proiecteObj = new Proiecte();
	$clientiObj = new Clienti();

	// Verifica ID-ul proiectului pt. care trebuie sa afiseze datele
	if(isset($_GET['proiectId']) && !empty($_GET['proiectId'])) {
	    $proiectId = $_GET['proiectId'];
	    $proiect = $proiecteObj->afiseazaDateProiectByID($proiectId);
	}

	// ToDoList
	$taskuri = $proiecteObj->afiseazaTaskuriByID($proiect['id']);
	//print_r($taskuri);

 	// Adauga date in tabelul intrari_taskuri pt. ToDoList
	if(isset($_POST['submit'])) {
		$proiecteObj->introducereTaskuri($_POST);
	}

	if (isset($_GET['alert']) == "adauga_task") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Task-ul a fost adaugat
            </div>";
 	}

 	// Sterge task
	if(isset($_GET['stergeTaskId']) && !empty($_GET['stergeTaskId'])) {
	    $stergeTaskId = $_GET['stergeTaskId'];
	    $id_proiect = $_GET['proiectId'];
	    $proiecteObj->stergeTaskProiect($stergeTaskId, $paginaActiva, $id_proiect);
	}

	// Seteaza status task-ului ca rezolvat
	if(isset($_GET['taskRezolvatId']) && !empty($_GET['taskRezolvatId'])) {
      $taskId = $_GET['taskRezolvatId'];
      $id_proiect = $_GET['proiectId'];
      $proiecteObj->statusTaskRezolvatPagina($taskId, $paginaActiva, $id_proiect);
  	}
  	// Seteaza status task-ului ca nerezolvat
  	if(isset($_GET['taskNerezolvatId']) && !empty($_GET['taskNerezolvatId'])) {
      $taskId = $_GET['taskNerezolvatId'];
      $id_proiect = $_GET['proiectId'];
      $proiecteObj->statusTaskNerezolvatPagina($taskId, $paginaActiva, $id_proiect);
  	}

?>
 <div class="container">
 	<div class="row">

 	<div class="col-md-4">
 	 	<div class="card mb-3 box-shadow"> 
 	 		<div class="card-body">
 	 			<?php if(empty($proiect['imagine'])) { ?>
		          <img class="profile-img img-fluid d-block" src="imagini/noimage.jpg" alt="<?php echo $proiect['nume']; ?>">          
		        <?php } else { ?>
		          <img class="profile-img img-fluid d-block" src="<?php echo $proiect['imagine'] ?? "imagini/noimage.jpg" ?>" alt="<?php echo $proiect['nume']; ?>">          
		        <?php } ?> 
				<div class="card-text text-center"><?php echo $proiect['descriere']; ?></div>
			</div>

	    </div>
	</div>

	<div class="col-md-8">
 	  	<div class="card mb-3 box-shadow"> 

			<div class="card-body">
				<div class="profile-header">

					<div class="pull-right">
		          		<a href="proiect_editare.php?modificaId=<?php echo $proiectId; ?>" class="btn btn-primary edit-profile">  Modifica
		          		</a>
		          	</div>

					<div>
						<h3 class="card-title"><?php echo $proiect['nume']; ?></h3>
						<span class="text-muted"><?php echo $proiect['data']; ?></small>
		          	</div>	          	
	          	</div>


	          	<table class="table" style="margin-top: 10px;">
				  <tbody>
				    <tr>
				      <th scope="row">Link</th>
				      <td><?php echo $proiect['link']; ?></td>
				    </tr>
				    <tr>
				      <th scope="row">Client</th>
				      <td><?php $clientiObj->afiseazaNumeClient($proiect['id_client']); ?></td>
				    </tr>
				    <tr>
				      <th scope="row">Buget</th>
				      <td><?php echo $proiect['buget']; ?></td>
				    </tr>
				    <tr>
				      <th scope="row">Status</th>
				      <td><?php $proiecteObj->afiseazaNumeStatus($proiect['status']); ?></td>
				    </tr>
				    <tr>
				      <th scope="row">Data inceperii</th>
				      <td><?php echo $proiect['data_start']; ?></td>
				    </tr>
				    <tr>
				      <th scope="row">Termen de finalizare</th>
				      <td><?php echo $proiect['data_final']; ?></td>
				    </tr>
				  </tbody>
				</table>

     		</div>
	    </div>
	</div>

	<!-- Taskuri proiect -->
	<div class="col-md-12">
	    <div class="card mb-3 box-shadow">
			<div class="card-body">

				<form method="post">
					<div class="input-group mb-3">
					  <input type="text" name="task" class="form-control" placeholder="Introduce taskul" aria-label="Introduce taskul" aria-describedby="basic-addon2">
					  <input type="hidden" class="" name="id_proiect" value="<?php echo $proiect['id']; ?>">
					  <div class="input-group-append">
					    <input type="submit" name="submit" class="btn btn-fill btn-primary" value="Adauga Task">
					  </div>
					</div>

					
					
				</form>	

				<table class="table">
					<tbody>
					<?php 
					if ($taskuri > 0) {
					foreach ($taskuri as $task) { ?>
					<tr>
						<td style="width: 30px;">
						<?php if($task['status'] == 0 ){ ?>   
				            <a href="proiect_pagina.php?taskRezolvatId=<?php echo $task['id'] ?>&proiectId=<?php echo $proiect['id']; ?>" class="btn btn-info btn-simple btn-link" style="color:blue">
				              <i class="far fa-square"></i>
				            </a>
				        <?php }else{ ?>
				        	<a href="proiect_pagina.php?taskNerezolvatId=<?php echo $task['id'] ?>&proiectId=<?php echo $proiect['id']; ?>"  class="btn btn-info btn-simple btn-link" style="color:blue">
				              <i class="fas fa-check-square"></i>
				            </a>
				        <?php } ?>
	    				</td>
						<td><?php echo $task['task']; ?></td>
						<td><?php echo $task['data']; ?></td>
						<td style="width: 40px">
							<a href="proiect_pagina.php?stergeTaskId=<?php echo $task['id'] ?>&proiectId=<?php echo $proiect['id']; ?>" class="btn btn-info btn-simple btn-link" style="color:red">
				              <i class="far fa-trash-alt"></i>
				            </a>
				        </td>
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