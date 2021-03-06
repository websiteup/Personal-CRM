<?php
require_once "config/bazadedate.php";

class Proiecte {

	// Conectare la baza de date
	public function __construct() {
		global $conexiune;
		
		$this->con = $conexiune;
		
		if(mysqli_connect_error()) {
			trigger_error("Eroare la conectarea bazei de date: " . mysqli_connect_error());
		}else{
			return $this->con;
		}
	}

//** Proiecte **

	// Introduce datele in tabelul proiecte
	public function introducereDateProiect(){
		$nume = $this->con->real_escape_string($_POST['nume']);	
		$link = $this->con->real_escape_string($_POST['link']);
		$categorie = $this->con->real_escape_string($_POST['categorie']);	
		$descriere = $this->con->real_escape_string($_POST['descriere']);		
		$client = $this->con->real_escape_string($_POST['client']);
		$buget = $this->con->real_escape_string($_POST['buget']);
		$status = $this->con->real_escape_string($_POST['status']);

		$data_start = $this->con->real_escape_string($_POST['data_start']);
		$data_start_format = date("Y-m-d",strtotime($data_start));

		$data_final = $this->con->real_escape_string($_POST['data_final']);
		$data_final_format = date("Y-m-d",strtotime($data_final));
		
		$query = "INSERT INTO proiecte(nume, link, categorie, descriere, id_client, buget, status, data_start, data_final) 
		VALUES(
			'$nume',
			'$link',
			'$categorie',
			'$descriere',			
			'$client',
			'$buget',
			'$status',
			'$data_start',
			'$data_final')";

			$sql = $this->con->query($query);			
			if ($sql == true) {			   
			    $_SESSION['notificare'] = "Proiectul a fost adaugat";
			    header("Location: proiecte.php");
			}else{
				$_SESSION['eroare'] = "Atentie: Nu s-a reusit introducerea proiectului!";
			}
	}

	// Arata datele din tabelul proiecte
	public function afiseazaProiecte(){		
		$query = "SELECT * FROM proiecte";
		$result = $this->con->query($query);
		
		if (!empty($result) && $result->num_rows > 0) {
		    $data = array();
		    while ($row = $result->fetch_assoc()) {
		           $data[] = $row;
		    }
			return $data;
		}
	}

	// Afiseaza datele proiectului din tabelul proiecte filtrand pe ID
	public function afiseazaDateProiectByID($id) {
		    $query = "SELECT * FROM proiecte WHERE id = '$id'";
		    $result = $this->con->query($query);
			if (!empty($result) && $result->num_rows > 0) {
				$row = $result->fetch_assoc();
				return $row;
			} else {
				echo "Nu s-a gasit nici un proiect!";
			}
	}

	// Afiseaza numele tabelul proiecte
	public function afiseazaNumeProiect($id){		
		$query = "SELECT * FROM proiecte WHERE id = '$id'";
		    $result = $this->con->query($query);

		    while($row = mysqli_fetch_assoc($result)) {
			echo $row['nume'];
			}
	}	

	// Timp estimativ pentru realizarea proiectului in zile
	public function timpEstimativProiect($data_start, $data_final) {

			$start_date = strtotime($data_start); 
			$end_date = strtotime($data_final); 
			  
			// Diferenta se divide in secunde 60/60/24 pentru a afisa zilele
			echo ceil(($end_date - $start_date)/60/60/24) . " zile"; 
	}

	// Actualizeaza datele din tabelul proiecte
	public function modificaProiect(){			

			$id = $this->con->real_escape_string($_POST['id']);

			$query = "SELECT * FROM proiecte WHERE id = '$id'";
		    $result = $this->con->query($query);
			if (!empty($result) && $result->num_rows > 0) {
				$proiect = $result->fetch_assoc();
			}	
			
			print_r($proiect);

			$nume = $this->con->real_escape_string($_POST['mnume']);	
			$link = $this->con->real_escape_string($_POST['mlink']);	
			$categorie = $this->con->real_escape_string($_POST['mcategorie']);	
			$descriere = $this->con->real_escape_string($_POST['mdescriere']);
			
			$client = $this->con->real_escape_string($_POST['mclient']);
			$buget = $this->con->real_escape_string($_POST['mbuget']);
			$status = $this->con->real_escape_string($_POST['mstatus']);

			// incarca fisierul in folderul imagini
			// Inca nu functioneaza... oare de ce ?
			if ($_FILES['mimagine']['size']>0) {
				$imagine = 'imagini/'.$_FILES['mimagine']['name'];				
				move_uploaded_file($_FILES['mimagine']['tmp_name'], $imagine);
			} else {
				$imagine = $proiect['imagine'];
			}

			$data_start = $this->con->real_escape_string($_POST['mdata_start']);
			$data_start_format = date("d-m-Y",strtotime($data_start));

			$data_final = $this->con->real_escape_string($_POST['mdata_final']);
			$data_final_format = date("d-m-Y",strtotime($data_final));

			if (!empty($id) && !empty($client)) {
				$query = "UPDATE proiecte SET 
				nume = '$nume',
				link = '$link',
				categorie  = '$categorie',
				descriere  = '$descriere',
				imagine    = '$imagine',
				id_client  = '$client',
				buget      = '$buget',
				status     = '$status',
				data_start = '$data_start',
				data_final = '$data_final'
				WHERE id = '$id'";

				$sql = $this->con->query($query);
				if ($sql == true) {				
				    $_SESSION['notificare'] = "Proiectul a fost actualizat";
				    header("Location:proiect_pagina.php?proiectId=$id");
				}else{
				    $_SESSION['eroare'] = "Atentie: actualizarea proiectului NU s-a efectuat!";
				}
			}			
	}

	// Sterge randul din tabelul clienti
	public function stergeProiect($id){

		    $query = "DELETE FROM proiecte WHERE id = '$id'";
		    echo $query;
		    $sql = $this->con->query($query);

			if ($sql == true) {
				$_SESSION['notificare'] = "Proiectul a fost sters";
				header("Location: proiecte.php");
			}else{
				$_SESSION['eroare'] = "Atentie: Proiectul NU a fost sters, incearca din nou!";
			}
	}


//** Categorii Proiecte **

	public function introducereDateProiecteCategorii(){

		$numeCategorie = $this->con->real_escape_string($_POST['numeCategorie']);

		$query = "INSERT INTO proiecte_categorii(numeCategorie) VALUES('$numeCategorie')";

			$sql = $this->con->query($query);			
			if ($sql == true) {
				$_SESSION['notificare'] = "Categoria a fost adaugata";
			    header("Location:proiecte_categorii.php");
			}else{
				$_SESSION['eroare'] = "Atentie: Categoria nu s-a inregistrat!";
			}

	}

	// Arata datele din tabelul proiecte_categorii
	public function afiseazaProiecteCategorii(){		
		    $query = "SELECT * FROM proiecte_categorii";
		    $result = $this->con->query($query);
		
		if (!empty($result) && $result->num_rows > 0) {
		    $data = array();
		    while ($row = $result->fetch_assoc()) {
		           $data[] = $row;
		    }
			return $data;
		}
	}

	// Afiseaza numele tabelul proiecte_categorii
	public function afiseazaNumeCategorie($id){		
		$query = "SELECT * FROM proiecte_categorii WHERE idCategorie = '$id'";
		    $result = $this->con->query($query);

		    while($row = mysqli_fetch_assoc($result)) {
			echo $row['numeCategorie'];
			}
	}	

	// Sterge randul din tabelul proiecte_categorii
	public function stergeProiecteCategorie($id){

		    $query = "DELETE FROM proiecte_categorii WHERE idCategorie = '$id'";
		    $sql = $this->con->query($query);

			if ($sql == true) {
				$_SESSION['notificare'] = "Categoria a fost stersa";
				header("Location: proiecte_categorii.php");
			}else{
				$_SESSION['eroare'] = "Atentie: Categoria NU a fost stearsa, incearca din nou!";
			}
	}

//** Statusuri Proiecte **

	// Adauga date in tabelul proiecte_statusuri
	public function introducereDateProiecteStatusuri(){
		$numeStatus = $this->con->real_escape_string($_POST['numeStatus']);
		$culoareStatus = $this->con->real_escape_string($_POST['culoareStatus']);
		$query = "INSERT INTO proiecte_statusuri(numeStatus, culoareStatus) VALUES('$numeStatus','$culoareStatus')";

			$sql = $this->con->query($query);			
			if ($sql == true) {
				$_SESSION['notificare'] = "Statusul a fost adaugata";
			    header("Location:proiecte_statusuri.php");
			}else{
				$_SESSION['eroare'] = "Atentie: Statusul nu s-a inregistrat!";
			}

	}

	// Arata datele din tabelul proiecte_statusuri
	public function afiseazaProiecteStatusuri(){		
		    $query = "SELECT * FROM proiecte_statusuri";
		    $result = $this->con->query($query);
		
		if (!empty($result) && $result->num_rows > 0) {
		    $data = array();
		    while ($row = $result->fetch_assoc()) {
		           $data[] = $row;
		    }
			return $data;
		}
	}

	// Afiseaza doar nuemele statusului
	public function afiseazaNumeStatus($id) {
		    $query = "SELECT * FROM proiecte_statusuri WHERE idStatus = '$id'";
		    $result = $this->con->query($query);

		    while($row = mysqli_fetch_assoc($result)) {
			echo "<span class='badge status' style='background-color:".$row['culoareStatus']."'>" .$row['numeStatus']. "</span>";
			}
	}

	// Sterge randul din tabelul proiecte_statusuri
	public function stergeProiecteStatusuri($id){

		    $query = "DELETE FROM proiecte_statusuri WHERE idStatus = '$id'";
		    $sql = $this->con->query($query);

			if ($sql == true) {
				$_SESSION['notificare'] = "Statusul a fost stersa";
				header("Location: proiecte_statusuri.php");
			}else{
				$_SESSION['eroare'] = "Atentie: Statusul NU a fost stearsa, incearca din nou!";
			}
	}


//** ToDoList / Taskuri **

	public function introducereTaskuri(){

		$task = $this->con->real_escape_string($_POST['task']);
		$id_proiect= $this->con->real_escape_string($_POST['id_proiect']);
		$status = '0';

		$query = "INSERT INTO proiecte_taskuri(id_proiect, task, status) VALUES('$id_proiect','$task','$status')";

			$sql = $this->con->query($query);			
			if ($sql == true) {
				$_SESSION['notificare'] = "Taskul a fost adaugata";
			    header("Location:proiect_pagina.php?proiectId=$id_proiect");
			} else {
				$_SESSION['eroare'] = "Atentie: Nu s-a reusit introducerea task-ului!";
			}
	}

	public function statusTaskRezolvat($idTask,$pagina){
		$query = "UPDATE proiecte_taskuri SET status='1' WHERE id=$idTask";
		$sql = $this->con->query($query);
		if ($sql == true) {
			$_SESSION['notificare'] = "Taskul a fost actualizat";
		    header("Location: $pagina.php");
		} else {
			$_SESSION['eroare'] = "Atentie: Taskul NU s-a actulizat!";
		}		
	}
	public function StatusTaskNerezolvat($idTask,$pagina){
		$query = "UPDATE proiecte_taskuri SET status='0' WHERE id=$idTask";
		$sql = $this->con->query($query);
		if ($sql == true) {
			$_SESSION['notificare'] = "Taskul a fost actualizat";
		    header("Location:$pagina.php");
		} else {
			$_SESSION['eroare'] = "Atentie: Taskul NU s-a actulizat!";
		}		
	}
	// Functiile pentru pagina proiect (Sa gasesc o metoda sa nu mai repet codul)
	public function statusTaskRezolvatPagina($idTask,$pagina,$id_proiect){
		$query = "UPDATE proiecte_taskuri SET status='1' WHERE id=$idTask";
		$sql = $this->con->query($query);
		if ($sql == true) {
			$_SESSION['notificare'] = "Taskul a fost actualizat";
		    header("Location: $pagina.php?proiectId=$id_proiect");
		} else {
			$_SESSION['eroare'] = "Atentie: Taskul NU s-a actulizat!";
		}		
	}
	public function StatusTaskNerezolvatPagina($idTask,$pagina,$id_proiect){
		$query = "UPDATE proiecte_taskuri SET status='0' WHERE id=$idTask";
		$sql = $this->con->query($query);
		if ($sql == true) {
			$_SESSION['notificare'] = "Taskul a fost actualizat";
		    header("Location:$pagina.php?proiectId=$id_proiect");
		} else {
			$_SESSION['eroare'] = "Atentie: Taskul NU s-a actulizat!";
		}		
	}

	public function seteazaPrioritateTask($idTask){

		$query = "UPDATE proiecte_taskuri SET status='1' WHERE id=$idTask";

			$sql = $this->con->query($query);			
			if ($sql == true) {
				$_SESSION['notificare'] = "Task-ul a fost actualizat";
			} else {
				$_SESSION['eroare'] = "Atentie: task-ul NU s-a actualizat!";
			}
	}

	public function afiseazaTaskuriByID($id){

			$query = "SELECT * FROM proiecte_taskuri WHERE id_proiect = '$id'";
		    $result = $this->con->query($query);		

			if (!empty($result) && $result->num_rows > 0) {
		    	$data = array();		    	
		    	while ($row = $result->fetch_assoc()) {
		           $data[] = $row;
		   		}
				return $data;
			} 	
	}

	public function afiseazaTaskuri(){	
		    $query = "SELECT * FROM proiecte_taskuri";
		    $result = $this->con->query($query);
		
		if (!empty($result) && $result->num_rows > 0) {
		    $data = array();
		    while ($row = $result->fetch_assoc()) {
		           $data[] = $row;
		    }
			return $data;
		} 
	}

	public function afiseazaTaskuriNerezolvateWidget(){	
		    $query = "SELECT * FROM proiecte_taskuri WHERE status = 0";
		    $result = $this->con->query($query);
		
		if (!empty($result) && $result->num_rows > 0) {
		    $data = array();
		    while ($row = $result->fetch_assoc()) {
		           $data[] = $row;
		    }
			return $data;
		} 
	}
	public function afiseazaTaskuriRezolvateWidget(){	
		    $query = "SELECT * FROM proiecte_taskuri WHERE status = 1";
		    $result = $this->con->query($query);
		
		if (!empty($result) && $result->num_rows > 0) {
		    $data = array();
		    while ($row = $result->fetch_assoc()) {
		           $data[] = $row;
		    }
			return $data;
		} 
	}

	public function stergeTask($id,$pagina){
		    $query = "DELETE FROM proiecte_taskuri WHERE id = '$id'";
		    $sql = $this->con->query($query);

			if ($sql == true) {
				$_SESSION['notificare'] = "Taskul a fost sters";
				//header("Location: $pagina.php");
			}else{
				$_SESSION['eroare'] = "Atentie: Taskul NU a fost stears, incearca din nou!";
			}
	}
	public function stergeTaskProiect($id, $pagina, $id_proiect){
		    $query = "DELETE FROM proiecte_taskuri WHERE id = '$id'";
		    $sql = $this->con->query($query);
			if ($sql == true) {
				$_SESSION['notificare'] = "Taskul a fost sters";
				header("Location: $pagina.php?proiectId=$id_proiect");
			}else{
				$_SESSION['eroare'] = "Atentie: Taskul NU a fost stears, incearca din nou!";
			}
	}

}