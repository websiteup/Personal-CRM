<?php
  
  $titluPagina = "Lista proiecte";
  require_once('elemente/header.php');

  $proiecteObj = new Proiecte();

  $clientiObj = new Clienti();

  // Apeleaza functia pentru afisearea proiectelor din db
  $proiecte = $proiecteObj->afiseazaProiecte();

  // Afiseaza clientii din tabelul clienti
  $clienti = $clientiObj->afiseazaClienti();

  // Afiseaza categoriile din tabelul proiecte_categorii
  $categorii = $proiecteObj->afiseazaProiecteCategorii();

  // Sterge proiect
  if(isset($_GET['stergeId']) && !empty($_GET['stergeId'])) {
      $stergeId = $_GET['stergeId'];
      $proiecteObj->stergeProiect($stergeId);
  }
?>

<h4>Lista proiecte <a href="proiect_adauga.php" class="btn btn-primary" style="float:right;"><i class="fa fa-plus"></i> Adauga</a> </h4>

<div style="padding: 10px; background-color: #FFF; margin-top: 20px;">


  <table class="table table-bordered table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nume</th>
        <th>Link</th>
        <th>Categorie</th>
        <th>Client</th>
        <th>Buget</th>
        <th>Status</th>
        <th>Termen</th>
        <th></th>
      </tr>
    </thead>
    <tbody>

        <?php           
          if ($proiecte > 0) {
          	foreach ($proiecte as $proiect) {
        ?>
        <tr>
          <td><?php echo $proiect['id'] ?></td>
          <td><?php echo $proiect['nume'] ?></td>          
          <td><?php echo $proiect['link'] ?></td>
          <td><?php $proiecteObj->afiseazaNumeCategorie($proiect['categorie']); ?></td>
          <td><?php $clientiObj->afiseazaNumeClient($proiect['id_client']); ?></td>
          <td><?php echo $proiect['buget'] ?></td>
          <td><?php $proiecteObj->afiseazaNumeStatus($proiect['status']); ?></td>
          <td><?php echo $proiect['data_final'] ?></td>
          <td class="text-center">
           
            <a href="proiect_pagina.php?proiectId=<?php echo $proiect['id'] ?>" class="btn btn-info btn-simple btn-link" style="color:blue">
              <i class="fa fa-lg fa-eye"></i>

            <a href="proiect_editare.php?modificaId=<?php echo $proiect['id'] ?>" class="btn btn-info btn-simple btn-link" style="color:green">
              <i class="fa fa-lg fa-edit"></i></a>
            
            <a href="proiecte.php?stergeId=<?php echo $proiect['id'] ?>" class="btn btn-info btn-simple btn-link" style="color:red" onclick="confirm('Esti sigur ca vrei sa stergi proiectul <?php echo $proiect['nume'] ?> ?')">
              <i class="fa fa-lg fa-trash" aria-hidden="true"></i>
            </a>
          </td>
        </tr>
		      <?php } ?>
		  <?php } else { ?>
		  <td colspan="9"><p class="text-center">Adauga primul tau proiect<p></td>
		  <?php } ?>
    </tbody>
  </table>

  </div>


<?php include 'elemente/footer.php'; // include footer-ul ?>