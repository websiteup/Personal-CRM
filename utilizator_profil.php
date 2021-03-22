<?php

  $titluPagina = 'Profil utilizator'; // seteaza numele paginii

  include 'elemente/header.php'; // include header-ul   

  include 'clase/utilizatori_functii.php'; // clasa Utilizatori 

  $utilizatoriObj = new Utilizatori();

  // Apeleaza functia pentru afisarea listei cu utilizatori
  $utilizator = $utilizatoriObj->afiseazaDateUtilizator($_SESSION['utilizator']);
  // $date = array(
  //   'id',
  //   'utilizator',
  //   'parola',
  //   'nume',
  //   'prenume',
  //    );
  $nume_complet = implode(",", $utilizator);

  print_r($utilizator);

?>
 
<h4>Date utilizator </h4>

<div style="padding: 10px; background-color: #FFF; margin-top: 20px;">

<form>
  <div class="form-group row">
    <label for="Utilizator" class="col-sm-2 col-form-label">Utilizator</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="Utilizator" value="<?php echo $utilizator['utilizator']; ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="Nume" class="col-sm-2 col-form-label">Nume</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="Nume" value="<?php echo $nume_complet; ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="Parola" class="col-sm-2 col-form-label">Parola</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="Parola" placeholder="<?php echo $utilizator['parola']; ?>">
    </div>
  </div>
</form>
</div>

<?php
include 'elemente/footer.php';
?>