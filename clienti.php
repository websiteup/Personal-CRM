<?php
  
  $titluPagina = "Clienti";
  require_once('elemente/header.php');

  $clientiObj = new Clienti();

  // Apeleaza functia pentru afisarea listei cu clienti
  $clienti = $clientiObj->afiseazaClienti();

  // Sterge inregistrare
  if(isset($_GET['stergeClientId']) && !empty($_GET['stergeClientId'])) {
      $clientId = $_GET['stergeClientId'];
      $clientiObj->stergeClient($clientId);
  }
?>

<h4>Lista clienti <a href="client_adauga.php" class="btn btn-primary" style="float:right;"><i class="fa fa-plus"></i> Adauga</a> </h4>

<div style="padding: 10px; background-color: #FFF; margin-top: 20px;">


  <table class="table table-bordered table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nume</th>
        <th>Descriere</th>
        <th>Adresa</th>
        <th>Email</th>
        <th>Telefon</th>
        <th></th>
      </tr>
    </thead>
    <tbody>

        <?php           
          if ($clienti > 0) {
          	foreach ($clienti as $client) {
        ?>
        <tr>
          <td><?php echo $client['id'] ?></td>
          <td><?php echo $client['nume'] ?></td>
          <td><?php echo $client['descriere'] ?></td>
          <td><?php echo $client['adresa'] ?></td>
          <td><a class="btn btn-info btn-sm" href="mailto:<?php echo $proiect['email']; ?>"><?php echo $client['email'] ?></a></td>
          <td><a class="btn btn-info btn-sm" href="tel<?php echo $client['telefon'] ?>"><?php echo $client['telefon'] ?></a></td>
          <td class="text-center">
           
            <a href="client_editare.php?editeazaClientId=<?php echo $client['id'] ?>" class="btn btn-info btn-simple btn-link" style="color:green">
              <i class="fa fa-lg fa-edit"></i></a>
            
            <a href="clienti.php?stergeClientId=<?php echo $client['id'] ?>" class="btn btn-info btn-simple btn-link" style="color:red" onclick="confirm('Esti sigur ca vrei sa stergi clientul <?php echo $client['nume'] ?> ?')">
              <i class="fa fa-lg fa-trash" aria-hidden="true"></i>
            </a>
          </td>
        </tr>
		      <?php } ?>
		  <?php } else { ?>
		  <td colspan="7"><p class="text-center">Adauga primul tau client<p></td>
		  <?php } ?>
    </tbody>
  </table>

  </div>


<?php include 'elemente/footer.php'; // include footer-ul ?>