<?php  

	$titluPagina = "Taskuri pentru proiecte";

    require_once 'elemente/header.php'; // include footer-ul

  	$proiecteObj = new Proiecte();

  	// Apeleaza functia pentru afisearea listei cu taskuri
	$taskuri = $proiecteObj->afiseazaTaskuri();

?>
  <h4><?php echo $titluPagina ?> <a href="proiect_adauga.php" class="btn btn-primary" style="float:right;"><i class="fa fa-plus"></i> Adauga</a> </h4>

<div style="padding: 10px; background-color: #FFF; margin-top: 20px;">

<table class="table table-bordered table-hover">
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
	</tbody>
</table>

<?php } else { ?>
	<p class="text-center">Adauga un task</p>
<?php } ?>

</div>

<?php include 'elemente/footer.php'; // include footer-ul ?>