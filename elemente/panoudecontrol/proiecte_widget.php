<?php
  

  $proiecteObj = new Proiecte();

  // Apeleaza functia pentru afisearea listei cu proiecte
  $proiecte = $proiecteObj->afiseazaProiecte();

?>

<div class="card card-proiecte">
  <div class="card-header">
    <h4 class="card-title"><i class="fas fa-globe"></i> Proiecte</h4>
  </div>

  <?php if ($proiecte > 0) { ?>   
  <table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nume</th>
        <td>Status</td>
        <td>Timp estimat</td>
        <th class="text-right"></th>
      </tr>
    </thead>
    <tbody>

        <?php foreach ($proiecte as $proiect) { ?>
        <tr>
          <td><?php echo $proiect['id'] ?></td>
          <td><a href="<?php echo $proiect['link'] ?>" target="_blank"><?php echo $proiect['nume'] ?></td>
          <td>Timp estimat</td>
          <td><?php $proiecteObj->afiseazaNumeStatus($proiect['status']); ?></td>
          <td class="text-right">
           
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
       <p class="text-center">Adauga un proiect</p>
      <?php } ?>

</div>
