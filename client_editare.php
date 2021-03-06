<?php

  $titluPagina = 'Modifica datele clientului'; // seteaza numele paginii

  include 'elemente/header.php'; // include header-ul   

  $clientiObj = new Clienti();

// Afiseaza date din tabelul clienti
  if(isset($_GET['editeazaClientId']) && !empty($_GET['editeazaClientId'])) {
    $modificaId = $_GET['editeazaClientId'];
    $client = $clientiObj->afiseazaDateClientByID($modificaId);
  }

// Actualizeaza datele din tabelul clienti
  if(isset($_POST['submit'])) {
    $clientiObj->modificaClient($_POST);
  }  

?>
 
<div class="top-pagina text-center" style="padding:15px; margin-bottom: 10px">
  <h4><?php echo $titluPagina ?></h4>
</div><br> 


<div class="container">

  <div class="col-md-7 mx-auto">

  <form action="client_editare.php" method="POST">
    <div class="card box-shadow p-4"> 
    <div class="form-group row">
      <label class="col-sm-2 col-form-label" for="nume">Nume:</label>
      <div class="col-sm-10">
      <input type="text" class="form-control" name="mnume" value="<?php echo $client['nume']; ?>" required="">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label" for="descriere">Descriere:</label>
      <div class="col-sm-10">
      <input type="textarea" class="form-control" name="mdescriere" value="<?php echo $client['descriere']; ?>" required="">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label" for="adresa">Adresa:</label>
      <div class="col-sm-10">
      <input type="text" class="form-control" name="madresa" value="<?php echo $client['adresa']; ?>" required="">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label" for="email">Email:</label>
      <div class="col-sm-10">
      <input type="text" class="form-control" name="memail" value="<?php echo $client['email']; ?>" required="">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label" for="telefon">Telefon:</label>
      <div class="col-sm-10">
      <input type="text" class="form-control" name="mtelefon" value="<?php echo $client['telefon']; ?>" required="">
      </div>
    </div>
    <input type="hidden" name="id" value="<?php echo $client['id']; ?>">
    <input type="submit" name="submit" class="btn btn-primary" value="Actualizeaza">
  
  </div>
  </form>
</div>
</div>

<?php
include 'elemente/footer.php';
?>