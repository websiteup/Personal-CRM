<?php

  $titluPagina = 'Editare nota'; // seteaza numele paginii

  include 'elemente/header.php'; // include header-ul


  $noteObj = new Note();


  // Afiseaza datele din tabelul note
  if(isset($_GET['modificaId']) && !empty($_GET['modificaId'])) {
    $modificaId = $_GET['modificaId'];
    $nota = $noteObj->afiseazaNoteByID($modificaId);
  }

  // Actualizeaza datele din tabelul note
  if(isset($_POST['actualizeaza'])) {
    //print_r($_POST);
    $noteObj->modificaNota($_POST);
  }

?>
 
  <h4><?php echo $titluPagina ?></h4>

<div class="row">


<div class="container">
<div class="row mt-5">
  <div class="col-md-10 mx-auto">
    
  <form action="nota_editare.php" method="POST">
    <div class="card box-shadow p-4"> 
    <div class="form-group">
      <label class="col-form-label" for="mnota"><h5>Editare nota:</h5></label>
      <textarea name="mnota" id="nota" rows="10" cols="80"><?php echo $nota[ 'nota' ]; ?></textarea>
            <script>
              window.onload = function(){
                // Replace the <textarea id="editor1"> with a CKEditor 4
                // instance, using default configuration.
                CKEDITOR.replace( 'nota' );
              }
            </script>
    </div>
    <input type="hidden" name="id" value="<?php echo $nota['id']; ?>">
    <input type="submit" name="actualizeaza" class="btn btn-fill btn-primary" value="Actualizeaza">
    </div>
  </form>

  </div>
</div>

</div>

<?php
include 'elemente/footer.php';
?>