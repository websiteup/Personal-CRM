<?php
  

  $proiecteObj = new Proiecte();

  // Apeleaza functia pentru afisearea listei cu proiecte
  $proiecte = $proiecteObj->afiseazaProiecte();

?>

<div class="card card-proiecte">
  <div class="card-header">
    <h4 class="card-title"><i class="fas fa-globe"></i> Proiecte <small>ultimele 5</small></h4>
  </div>

  <?php if ($proiecte > 0) { ?>   
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Link</th>        
        <td>Timp estimat</td>
        <td>Status</td>
        <th style="width: 60px"></th>
      </tr>
    </thead>
    <tbody>

        <?php foreach ($proiecte as $proiect) { ?>
        <tr>
          <td> <a href="<?php echo $proiect['link'] ?>" target="_blank"><?php echo $proiect['nume'] ?> </td>
          <td> <?php $proiecteObj->timpEstimativProiect($proiect['data_start'],$proiect['data_final']); ?> </td>
          <td> <?php $proiecteObj->afiseazaNumeStatus($proiect['status']); ?> </td>
          <td style="width: 60px">
           
            <a class="btn btn-info btn-simple btn-link" href="proiect_pagina.php?proiectId=<?php echo $proiect['id'] ?>" style="color:blue">
              <i class="fa fa-lg fa-eye"></i>

            <a class="btn btn-info btn-simple btn-link" href="proiect_editare.php?modificaId=<?php echo $proiect['id'] ?>" style="color:green">
              <i class="fa fa-lg fa-edit"></i></a>
            
          </td>
        </tr>
		      <?php } ?>		  
    </tbody>
  </table>

  <?php } else { ?>
       <p class="text-center p-2">Adauga un proiect</p>
      <?php } ?>

</div>
