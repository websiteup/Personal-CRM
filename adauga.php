<?php

  $titluPagina = 'Adauga o intrare noua'; // seteaza numele paginii

  include 'elemente/header.php'; // include header-ul


  $listaObj = new Intrari();

  // Adauga date in tabelul intrari
  if(isset($_POST['submit'])) {
    $listaObj->introducereDate($_POST);
  }

?>
 
<div class="top-pagina text-center" style="padding:15px; margin-bottom: 10px">
  <h4><?php echo $titluPagina ?></h4>
</div><br> 


<div class="container">

  <div class="col-md-7 mx-auto">
  <form action="adauga.php" method="POST">
    <div class="card box-shadow p-4"> 
    <div class="form-group row">
      <label class="col-sm-2 col-form-label" for="nume">Nume:</label>
      <div class="col-sm-10">
      <input type="text" class="form-control" name="nume" placeholder="Numele companiei" required="">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label" for="descriere">Descriere:</label>
      <div class="col-sm-10">
      <input type="textarea" class="form-control" name="descriere" placeholder="Descriere" required="">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label" for="adresa">Adresa:</label>
      <div class="col-sm-10">
      <input type="text" class="form-control" name="adresa" placeholder="Adresa" required="">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label" for="website">Website:</label>
      <div class="col-sm-10">
      <input type="text" class="form-control" name="website" placeholder="Website" required="">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label" for="email">Email:</label>
      <div class="col-sm-10">
      <input type="text" class="form-control" name="email" placeholder="Email" required="">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label" for="telefon">Telefon:</label>
      <div class="col-sm-10">
      <input type="text" class="form-control" name="telefon" placeholder="Telefon" required="">
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