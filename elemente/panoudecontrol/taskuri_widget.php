<?php

  $taskObj = new Proiecte();

  $taskuri = $taskObj->afiseazaTaskuriWidget();

  //var_dump($taskuri)

?>

<div class="card card-proiecte">
  <div class="card-header">
    <h4 class="card-title"><i class="fas fa-project-diagram"></i> Taskuri <small>ultimele taskuri nerezolvate</small></h4>
  </div>


  <table class="table table-bordered table-hover m-0">
    <thead>
      <tr>
        <th>Task</th>
        <th>Proiect</th>        
        <th class="text-right"></th>
      </tr>
    </thead>
    <tbody>
    <?php 
      $i = 0;
      $limita = count($taskuri);
      while ($i < 7) {                  
      ?>
    <tr>
      <td><?php echo $taskuri[$i]['task']; ?></td>
      <td><a href="proiect_pagina.php?proiectId=<?php echo $taskuri[$i]['id_proiect'] ?>">
           <?php $taskObj->afiseazaNumeProiect($taskuri[$i]['id_proiect']); ?>
        </a>
      </td>
      <td>x</td>
    </tr>
    <?php 
    $i++;  
    if( $i == $limita )break; } ?>
  </tbody>
  </table>
  </div>
