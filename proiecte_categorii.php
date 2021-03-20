<?php

  $titluPagina = 'Categorii proiect'; // seteaza numele paginii

  include 'elemente/header.php'; // include header-ul   

  $proiecteObj = new Proiecte();

// Afiseaza categoriile
    $categorii = $proiecteObj->afiseazaProiecteCategorii();

// Adauga date in tabelul proiecte_categorii
  if(isset($_POST['submit'])) {
    print_r($_POST);
    $proiecteObj->introducereDateProiecteCategorii($_POST);
  }

// Sterge categoria selectata
  if(isset($_GET['stergeCategorieId']) && !empty($_GET['stergeCategorieId'])) {
      $stergeCategorieId = $_GET['stergeCategorieId'];
      $proiecteObj->stergeProiecteCategorie($stergeCategorieId);
  }
// Actualizeaza  date in tabelul proiecte_categoriie
  // if(isset($_POST['submit'])) {
  //   $proiecteObj->modificaProiect($_POST);
  // }  

?>


<h4>Categorii proiecte </h4>

<div class="row mt-5">

  <div class="col-md-6 mx-auto">
  <div class="card">

  <?php if ($categorii > 0) { ?>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nume categorie</th>
        <th></th>
      </tr>
    </thead>
    <tbody>

    <?php foreach ($categorii as $categorie) { ?>
        <tr>
          <td><?php echo $categorie['idCategorie'] ?></td>
          <td><?php echo $categorie['numeCategorie'] ?></td>
          <td class="text-right">           
            <a href="proiecte_categorii.php?stergeCategorieId=<?php echo $categorie['idCategorie'] ?>" style="color:red">
              <i class="fa fa-lg fa-trash" aria-hidden="true"></i>
          </td>
        </tr>
    <?php } ?>
    </tbody>
  </table>
  <?php } else { ?>
      <p class="text-center mt-4">Nici o categorie gasita<p>
      <?php } ?>

  </div>
  </div>



  <div class="col-md-6">
  <form action="proiecte_categorii.php" method="POST">
    <div class="card box-shadow p-4"> 
    <div class="form-group">
      <label class=" col-form-label" for="numeCategorie">Nume categorie:</label>
      <input type="text" class="form-control" name="numeCategorie" placeholder="Numele categorie" required="">
    </div> 
    <input type="submit" name="submit" class="btn btn-fill btn-primary" value="Adauga">
    </div>
  </form>
  </div>
</div>

<?php
include 'elemente/footer.php';
?>