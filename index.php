<?php
  
  $titluPagina = 'PAUL CRM'; // seteaza numele paginii
  
  include 'elemente/header.php'; // include header-ul   

  $listaObj = new Intrari();

  // Apeleaza functia pentru afisearea listei cu intrari
  $lista = $listaObj->afiseazaIntrarile();

  // Sterge inregistrare
  if(isset($_GET['stergeId']) && !empty($_GET['stergeId'])) {
      $stergeId = $_GET['stergeId'];
      $listaObj->stergeInregistrare($stergeId);
  }
?>

<div class="top-pagina text-center" style="padding:15px; margin-bottom: 10px">
  <h4><?php echo $titluPagina ?></h4>
  breadcrumb
</div>

<div class="container">
    <?php
    if (isset($_GET['msg1']) == "adauga") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Inregistrarea a fost introdusa cu succes
            </div>";
      } 
    if (isset($_GET['msg2']) == "profil_editare") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Inregistrarea a fost modificata cu succes
            </div>";
    }
    if (isset($_GET['msg3']) == "sterge") {
      echo "<div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Inregistrarea a fost stearsa
            </div>";
    }
    ?>

ideea de proiect
aplicatie de completat brief-uri pentru client

<h4>Lista companii <a href="adauga.php" class="btn btn-primary" style="float:right;"><i class="fa fa-plus"></i> Adauga</a> </h4>

<div style="padding: 10px; background-color: #FFF; margin-top: 20px;">


  <table class="table table-bordered table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nume</th>
        <th>Descriere</th>
        <th>Adresa</th>
        <th>WebSite</th>
        <th>Email</th>
        <th>Telefon</th>
        <th></th>
      </tr>
    </thead>
    <tbody>

        <?php           
          if ($lista > 0) {
          	foreach ($lista as $intrare) {
        ?>
        <tr>
          <td><?php echo $intrare['id'] ?></td>
          <td><?php echo $intrare['nume'] ?></td>
          <td><?php echo $intrare['descriere'] ?></td>
          <td><?php echo $intrare['adresa'] ?></td>
          <td><?php echo $intrare['website'] ?></td>
          <td><?php echo $intrare['email'] ?></td>
          <td><?php echo $intrare['telefon'] ?></td>
          <td class="text-center">
           
            <a href="profil.php?intrareId=<?php echo $intrare['id'] ?>" style="color:blue">
              <i class="fa fa-lg fa-eye"></i>

            <a href="profil_editare.php?modificaId=<?php echo $intrare['id'] ?>" style="color:green">
              <i class="fa fa-lg fa-edit"></i></a>
            
            <a href="panoudecontrol.php?stergeId=<?php echo $intrare['id'] ?>" style="color:red" onclick="confirm('Are you sure want to delete this record')">
              <i class="fa fa-lg fa-trash" aria-hidden="true"></i>
            </a>
          </td>
        </tr>
		      <?php } ?>
		  <?php } else { ?>
		  <td colspan="8"><p class="text-center">Nu s-a gasit nici o inregistrare<p></td>
		  <?php } ?>
    </tbody>
  </table>

  </div>
</div>


<?php
include 'elemente/footer.php'; // include footer-ul
?>