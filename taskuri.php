<?php  

	$titluPagina = "Taskuri pentru proiecte";

    require_once 'elemente/header.php'; // include footer-ul

  	$proiecteObj = new Proiecte();

  	// Apeleaza functia pentru afisearea listei cu taskuri
	$taskuri = $proiecteObj->afiseazaTaskuri();

	// Seteaza status task-ului ca rezolvat
	if(isset($_GET['taskRezolvatId']) && !empty($_GET['taskRezolvatId'])) {
      $taskId = $_GET['taskRezolvatId'];
      $proiecteObj->statusTaskRezolvat($taskId,$paginaActiva);
  	}
  	// Seteaza status task-ului ca nerezolvat
  	if(isset($_GET['taskNerezolvatId']) && !empty($_GET['taskNerezolvatId'])) {
      $taskId = $_GET['taskNerezolvatId'];
      $proiecteObj->statusTaskNerezolvat($taskId,$paginaActiva);
  	}

  	// Sterge task
	if(isset($_GET['stergeId']) && !empty($_GET['stergeId'])) {
	    $stergeId = $_GET['stergeId'];
	    $proiecteObj->stergeTask($stergeId,$paginaActiva);
	}

?>
  <h4><?php echo $titluPagina ?> <a href="proiect_adauga.php" class="btn btn-primary" style="float:right;"><i class="fa fa-plus"></i> Adauga</a> </h4>

<div style="padding: 10px; background-color: #FFF; margin-top: 20px;">

<table class="table table-bordered table-hover">
	<tbody>
	<?php 
	if ($taskuri > 0) {
	foreach ($taskuri as $task) { ?>
	<tr>
		<td class="text-center" style="width: 60px;">

        <?php if($task['status'] ==0){ ?>   
            <a href="taskuri.php?taskRezolvatId=<?php echo $task['id'] ?>" onClick="refreshPage()" class="btn btn-info btn-simple btn-link" style="color:blue">
              <i class="far fa-square"></i>
            </a>
        <?php }else{ ?>
        	<a href="taskuri.php?taskNerezolvatId=<?php echo $task['id'] ?>" onClick="refreshPage()" class="btn btn-info btn-simple btn-link" style="color:blue">
              <i class="fas fa-check-square"></i>
            </a>
        <?php } ?>
        </td>
		<td><?php echo $task['task']; ?></td>
		<td><a href="proiect_pagina.php?proiectId=<?php echo $task['id_proiect'] ?>">
			<?php $proiecteObj->afiseazaNumeProiect($task['id_proiect']); ?>
			</a>
		</td>
		<td><?php echo $task['data']; ?></td>
		<td style="width:20px">
			<a href="taskuri.php?stergeId=<?php echo $task['id'] ?>" class="btn btn-info btn-simple btn-link" style="color:red" onclick="confirm('Esti sigur ca vrei sa stergi taskul ?')">
              <i class="far fa-trash-alt"></i>
            </a>
        </td>
		
	</tr>
	<?php } ?>
	</tbody>
</table>

<?php } else { ?>
	<p class="text-center">Adauga un task</p>
<?php } ?>

</div>

<script type="text/javascript">
	function refreshPage(){
		location.replace('taskuri.php')
	} 
</script>

<?php include 'elemente/footer.php'; // include footer-ul ?>