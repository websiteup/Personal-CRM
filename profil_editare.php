<?php

  $titluPagina = 'Modifica compania'; // seteaza numele paginii

  include 'elemente/header.php'; // include header-ul   

  $listaObj = new Intrari();

// Adauga date in tabelul intrari
  if(isset($_GET['modificaId']) && !empty($_GET['modificaId'])) {
    $modificaId = $_GET['modificaId'];
    $intrare = $listaObj->afiseazaDateleByID($modificaId);
  }

// Actualizeaza inregistrarile din tabelul intrari
// si redirectioneaza catre index.php
  if(isset($_POST['submit'])) {
    $listaObj->modificaIntrarea($_POST);
  }  

?>
 
<div class="top-pagina text-center" style="padding:15px; margin-bottom: 10px">
  <h4><?php echo $titluPagina ?></h4>
</div><br> 


<div class="container">

  <div class="col-md-7 mx-auto">

  <form action="profil_editare.php" method="POST">
    <div class="card box-shadow p-4"> 
    <div class="form-group row">
      <label class="col-sm-2 col-form-label" for="nume">Nume:</label>
      <div class="col-sm-10">
      <input type="text" class="form-control" name="mnume" value="<?php echo $intrare['nume']; ?>" required="">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label" for="descriere">Descriere:</label>
      <div class="col-sm-10">
      <input type="textarea" class="form-control" name="mdescriere" value="<?php echo $intrare['descriere']; ?>" required="">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label" for="adresa">Adresa:</label>
      <div class="col-sm-10">
      <input type="text" class="form-control" name="madresa" value="<?php echo $intrare['adresa']; ?>" required="">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label" for="website">Website:</label>
      <div class="col-sm-10">
      <input type="text" class="form-control" name="mwebsite" value="<?php echo $intrare['website']; ?>" required="">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label" for="email">Email:</label>
      <div class="col-sm-10">
      <input type="text" class="form-control" name="memail" value="<?php echo $intrare['email']; ?>" required="">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label" for="telefon">Telefon:</label>
      <div class="col-sm-10">
      <input type="text" class="form-control" name="mtelefon" value="<?php echo $intrare['telefon']; ?>" required="">
      </div>
    </div>
    <input type="hidden" name="id" value="<?php echo $intrare['id']; ?>">
    <input type="submit" name="submit" class="btn btn-primary" value="Actualizeaza">
  
  </div>
  </form>
</div>
</div>

<?php
include 'elemente/footer.php';
?>