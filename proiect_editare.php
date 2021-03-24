<?php

  $titluPagina = 'Modifica proiectul'; // seteaza numele paginii

  include 'elemente/header.php'; // include header-ul   

  $proiecteObj = new Proiecte();
  $clientiObj = new Clienti();

// Afiseaza datele din tabelul proiecte
  if(isset($_GET['modificaId']) && !empty($_GET['modificaId'])) {
    $modificaId = $_GET['modificaId'];
    $proiect = $proiecteObj->afiseazaDateProiectByID($modificaId);
  }

// Afiseaza clientii din tabelul clienti
  $clienti = $clientiObj->afiseazaClienti();

// Afiseaza categoriile din tabelul proiecte_categorii
  $categorii = $proiecteObj->afiseazaProiecteCategorii();

// Afiseaza statusurile din tabelul proiecte_statusuri
  $statusuri = $proiecteObj->afiseazaProiecteStatusuri();

// Actualizeaza datele din tabelul proiecte
  if(isset($_POST['submit'])) {  
    $proiecteObj->modificaProiect($_POST);
  }

?>
 
<div class="top-pagina text-center" style="padding:15px; margin-bottom: 10px">
  <h4><?php echo $titluPagina ?></h4>
</div><br> 


<div class="container">

  <div class="col-md-7 mx-auto">

  <form action="proiect_editare.php?modificaId=<?php echo $proiect['id']; ?>" method="POST" enctype="multipart/form-data">
    <div class="card box-shadow p-4"> 
    <div class="form-group row">
      <label class="col-sm-2 col-form-label" for="descriere">Imagine:</label>
      <div class="col-sm-10">

      <?php if(empty($proiect['imagine'])) { ?>
          <img style="max-width: 150px;" class="profile-img img-fluid d-block" src="imagini/noimage.jpg" alt="<?php echo $proiect['nume']; ?>">         
        <?php } else { ?>
          <img style="max-width: 150px;" class="profile-img img-fluid" src="<?php echo $proiect['imagine'];?>" alt="<?php echo $proiect['nume']; ?>">
        <?php } ?> 
      <input type="file" class="form-control" name="mimagine">
      </div>
    </div> 
    <div class="form-group row">
      <label class="col-sm-2 col-form-label" for="nume">Nume:</label>
      <div class="col-sm-10">
      <input type="text" class="form-control" name="mnume" value="<?php echo $proiect['nume']; ?>" required="">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label" for="adresa">Link:</label>
      <div class="col-sm-10">
      <input type="text" class="form-control" name="mlink" value="<?php echo $proiect['link']; ?>">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label" for="client">Categorie:</label>
      <div class="col-sm-10">

      <select class="form-control" name="mcategorie" >
      <option hidden value='<?php echo $proiect['categorie']; ?>'><?php $proiecteObj->afiseazaNumeCategorie($proiect['categorie']); ?></option>
      <?php foreach ($categorii as $categorie) {
              echo "<option value='".$categorie['idCategorie']."'>".$categorie['numeCategorie']."</option>";
  
      } ?>
      </select>       
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label" for="descriere">Descriere:</label>
      <div class="col-sm-10">
      <input type="textarea" class="form-control" name="mdescriere" value="<?php echo $proiect['descriere']; ?>">
      </div>
    </div>    
    <div class="form-group row">
      <label class="col-sm-2 col-form-label" for="client">Cient:</label>
      <div class="col-sm-10">

      <select class="form-control" name="mclient" >
      <option hidden value='<?php echo $proiect['id_client']; ?>'><?php $clientiObj->afiseazaNumeClient($proiect['id_client']); ?></option>
      <?php foreach ($clienti as $client) {
              echo "<option value='".$client['id']."'>".$client['nume']."</option>";
  
      } ?>
      </select>       
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label" for="mbuget">Buget:</label>
      <div class="col-sm-10">
      <input type="text" class="form-control" name="mbuget" value="<?php echo $proiect['buget']; ?>"  required="">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label" for="mstatus">Status:</label>
      <div class="col-sm-10">

      <select class="form-control" name="mstatus" >
      <option hidden value='<?php echo $proiect['status']; ?>'><?php $proiecteObj->afiseazaNumeStatus($proiect['status']); ?></option>
      <?php foreach ($statusuri as $status) {
              echo "<option style='color:".$status['culoareStatus']."'value='".$status['idStatus']."'>".$status['numeStatus']."</option>";
  
      } ?>
      </select>       
      </div>

    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label" for="mdata_start">Data incepere:</label>
      <div class="col-sm-10">
      <input type="date" class="form-control" name="mdata_start" value="<?php echo $proiect['data_start']; ?>"  required="">
      </div>
    </div>
     <div class="form-group row">
      <label class="col-sm-2 col-form-label" for="mdata_final">Data finala:</label>
      <div class="col-sm-10">
      <input type="date" class="form-control" name="mdata_final" value="<?php echo $proiect['data_final']; ?>"  required="">
      </div>
    </div>
    <input type="hidden" name="id" value="<?php echo $proiect['id']; ?>">
    <input type="submit" name="submit" class="btn btn-primary" value="Actualizeaza">
  
  </div>
  </form>
</div>
</div>

<?php
include 'elemente/footer.php';
?>