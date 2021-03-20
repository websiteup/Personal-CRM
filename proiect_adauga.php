<?php

  $titluPagina = 'Adauga proiect noua'; // seteaza numele paginii

  include 'elemente/header.php'; // include header-ul

  $proiecteObj = new Proiecte();
  $clientiObj = new Clienti();

  // Adauga date in tabelul proiecte
  if(isset($_POST['submit'])) {
    print_r($_POST);
    $proiecteObj->introducereDateProiect($_POST);
  }

  // Afiseaza clientii din tabelul clienti
  $clienti = $clientiObj->afiseazaClienti();

  // Afiseaza categoriile din tabelul proiecte_categorii
  $categorii = $proiecteObj->afiseazaProiecteCategorii();

?>
 
<div class="top-pagina text-center" style="padding:15px; margin-bottom: 10px">
  <h4><?php echo $titluPagina ?></h4>
</div><br> 


<div class="container">

  <div class="col-md-7 mx-auto">
  <form action="proiect_adauga.php" method="POST">
    <div class="card box-shadow p-4"> 
    <div class="form-group row">
      <label class="col-sm-2 col-form-label" for="nume">Nume:</label>
      <div class="col-sm-10">
      <input type="text" class="form-control" name="nume" placeholder="Numele companiei" required="">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label" for="adresa">Link:</label>
      <div class="col-sm-10">
      <input type="text" class="form-control" name="link" placeholder="Link" required="">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label" for="descriere">Descriere:</label>
      <div class="col-sm-10">
      <input type="textarea" class="form-control" name="descriere" placeholder="Descriere" required="">
      </div>
    </div>    
    <div class="form-group row">
      <label class="col-sm-2 col-form-label" for="client">Cient:</label>
      <div class="col-sm-10">

      <select class="form-control" name="client" >
      <option hidden value=''>--- Alege un client ---</option>
      <?php foreach ($clienti as $client) {
              echo "<option value='".$client['id']."'>".$client['nume']."</option>";
  
      } ?>
      </select>       
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label" for="buget">Buget:</label>
      <div class="col-sm-10">
      <input type="text" class="form-control" name="buget" placeholder="Buget" required="">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label" for="status">Status:</label>
      <div class="col-sm-10">
      <input type="text" class="form-control" name="status" placeholder="Status" required="">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label" for="data_start">Data incepere:</label>
      <div class="col-sm-10">
      <input type="date" class="form-control" name="data_start" placeholder="Data incepere" required="">
      </div>
    </div>
     <div class="form-group row">
      <label class="col-sm-2 col-form-label" for="data_final">Data finala:</label>
      <div class="col-sm-10">
      <input type="date" class="form-control" name="data_final" placeholder="data_final" required="">
      </div>
    </div>
    <input type="submit" name="submit" class="btn btn-primary" value="Inregistreaza">
    </div>
  </form>
  </div>
</div>

<?php
include 'elemente/footer.php';
?>