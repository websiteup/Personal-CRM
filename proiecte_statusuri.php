<?php

  $titluPagina = 'Statusuri proiecte'; // seteaza numele paginii

  include 'elemente/header.php'; // include header-ul   

  $proiecteObj = new Proiecte();

// Afiseaza categoriile
  $statusuri = $proiecteObj->afiseazaProiecteStatusuri();

// Adauga date in tabelul proiecte_categorii
  if(isset($_POST['submit'])) {
    print_r($_POST);
    $proiecteObj->introducereDateProiecteStatusuri($_POST);
  }

// Sterge categoria selectata
  if(isset($_GET['stergeStatusId']) && !empty($_GET['stergeStatusId'])) {
      $stergeStatusId = $_GET['stergeStatusId'];
      $proiecteObj->stergeProiecteStatusuri($stergeStatusId);
  }
// Actualizeaza  date in tabelul proiecte_categoriie
  // if(isset($_POST['submit'])) {
  //   $proiecteObj->modificaProiect($_POST);
  // }  

?>


<h4>Statusuri proiecte </h4>

<div class="row mt-5">

  <div class="col-md-6 mx-auto">
  <div class="card">

  <?php if ($statusuri > 0) { ?>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nume status</th>
        <th>Culoare status</th>
        <th></th>
      </tr>
    </thead>
    <tbody>

    <?php foreach ($statusuri as $status) { ?>
        <tr style="color: <?php echo $status['culoareStatus'] ?>">
          <td><?php echo $status['idStatus'] ?></td>
          <td><?php echo $status['numeStatus'] ?></td>
          <td><?php echo $status['culoareStatus'] ?></td>
          <td class="text-right">           
            <a href="proiecte_statusuri.php?stergeStatusId=<?php echo $status['idStatus'] ?>" style="color:red">
              <i class="fa fa-lg fa-trash" aria-hidden="true"></i>
          </td>
        </tr>
    <?php } ?>
    </tbody>
  </table>
  <?php } else { ?>
      <p class="text-center mt-4">Nici un status gasita<p>
      <?php } ?>

  </div>
  </div>

  <div class="col-md-6">
  <form action="proiecte_statusuri.php" method="POST">
    <div class="card box-shadow p-4"> 
    <div class="form-group">
      <label class="col-form-label" for="numeStatus">Nume status:</label>
      <input type="text" class="form-control" name="numeStatus" placeholder="Numele status" required="">
    </div> 
    <div class="form-group">
      <label class="col-form-label" for="culoareStatus">Cod culoare status:</label>
      <input type="text" class="form-control" name="culoareStatus" placeholder="Cod culoare status">
    </div> 
    <input type="submit" name="submit" class="btn btn-fill btn-primary" value="Adauga">
    </div>
  </form>
  </div>
</div>

<?php
include 'elemente/footer.php';
?>