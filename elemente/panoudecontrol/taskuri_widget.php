<?php
  

  $taskObj = new Proiecte();

  // Apeleaza functia pentru afisearea listei cu proiecte
  $taskuri = $taskObj->afiseazaTaskuri();

?>

<div class="card card-proiecte">
  <div class="card-header">
    <h4 class="card-title"><i class="fas fa-project-diagram"></i> Taskuri </h4>
  </div>

  <?php if ($taskuri > 0) { ?>  
  <table class="table table-bordered table-hover">
    <tbody>
    <?php foreach ($taskuri as $task) { ?>
    <tr>
      <td style="width: 30px;"><?php echo $task['id']; ?></td>
      <td><?php echo $task['task']; ?></td>
      <td><?php echo $task['data']; ?></td>
      <td>x</td>
    </tr>
    <?php } ?>
  </tbody>
  </table>

  <?php } else { ?>
       <p class="text-center">Adauga un task</p>
      <?php } ?>

  </div>
