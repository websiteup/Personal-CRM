<?php

  $titluPagina = 'Note'; // seteaza numele paginii

  include 'elemente/header.php'; // include header-ul


  $noteObj = new Note();

  // Apeleaza functia pentru afisearea notelor
  $listaNote = $noteObj->afiseazaNotele();

  // Adauga date in tabelul intrari
  if(isset($_POST['submit'])) {
    print_r($_POST);
    $noteObj->introducereNota($_POST);
  }

?>
 
  <h4><?php echo $titluPagina ?></h4>

<div class="row">

    <?php 
    if ($listaNote > 0) {
    foreach ($listaNote as $nota) { ?>

    <div class="col-md-4 p-2">    
      <div class="bg-white p-2 rounded">    
        <div class="box-nota">
            <?php echo $nota['nota']; ?>
        </div>
        <div class="user-info text-right mr-2">
          <span class="date text-black-50"><i><?php echo $nota['data']; ?></i></span>
        </div>
      </div>
    </div>

    <?php } ?>
    <?php } ?>

</div>

<div class="container">
<div class="row mt-5">
  <div class="col-md-10 mx-auto">
    
  <form action="note.php" method="POST">
    <div class="card box-shadow p-4"> 
    <div class="form-group">
      <label class="col-form-label" for="nota"><h5>Adauga nota:</h5></label>
      <textarea name="nota" id="nota" rows="10" cols="80"></textarea>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor 4
                // instance, using default configuration.
                CKEDITOR.replace( 'nota' );
            </script>
    </div>
    <input type="submit" name="submit" class="btn btn-fill btn-primary" value="Adauga">
    </div>
  </form>

  </div>
</div>

</div>

<?php
include 'elemente/footer.php';
?>