<?php
  

  $noteObj = new Note();

  // Apeleaza functia pentru afisearea listei cu proiecte
  $listaNote = $noteObj->afiseazaNotele();

?>

<div class="card card-note">
  <div class="card-header">
    <h4 class="card-title"><i class="fas fa-pencil-alt"></i> Note</h4>
  </div>
    <?php 
    if ($listaNote > 0) {
    foreach ($listaNote as $nota) { ?>
    <div class="bg-white p-2">        
        <div class="box-nota ml-2 mt-2">
            <?php echo $nota['nota']; ?>
        </div>
        <div class="user-info mr-2">
    <span class="date float-right text-black-50"><?php echo $nota['data']; ?></span>
        </div>
    </div>

    <?php } ?>
    <?php } ?>

  </div>
