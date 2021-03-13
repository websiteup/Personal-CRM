<?php
require_once "elemente/bazadedate.php";

class Intrari {	

	// Se conecteaza la baza de date
	public function __construct() {
		global $conexiune;
		
		$this->con = $conexiune;
		
		if(mysqli_connect_error()) {
			trigger_error("Eroare la conectarea bazei de date: " . mysqli_connect_error());
		}else{
			return $this->con;
		}
	}

	// Introduce datele in tabelul intrari
	public function introducereDate(){
		$nume = $this->con->real_escape_string($_POST['nume']);		
		$descriere = $this->con->real_escape_string($_POST['descriere']);
		$adresa = $this->con->real_escape_string($_POST['adresa']);
		$website = $this->con->real_escape_string($_POST['website']);
		$email = $this->con->real_escape_string($_POST['email']);
		$telefon = $this->con->real_escape_string($_POST['telefon']);
		
		//$utilizator = $this->con->real_escape_string($_POST['utilizator']);
		//$parola_utilizator = $this->con->real_escape_string(md5($_POST['parola_utilizator']));

		// $date = array();

		// $date['intrare_date'] = array(
		// 	'nume'		=> $nume,
		// 	'descriere' => $descriere,
		// 	'adresa' 	=> $adresa,
		// 	'website' 	=> $website,
		// 	'email' 	=> $nemailume,
		// 	'telefon' 	=> $telefon,
		// );
		$query = "INSERT INTO intrari(nume,descriere,adresa,website,email,telefon) VALUES('$nume','$descriere','$adresa','$email','$website','$telefon')";

			$sql = $this->con->query($query);			
			if ($sql == true) {
			    header("Location:index.php?msg1=adauga");
			}else{
			    echo "Nu s-a reusit introducerea datelor!";
			}
	}


	// Arata inregistrarile din tabelul intrari mai frumos, elegant, cat de dat
	public function afiseazaIntrarile(){		
		    $query = "SELECT * FROM intrari";
		    $result = $this->con->query($query);
		
		if ($result->num_rows > 0) {
		    $data = array();
		    while ($row = $result->fetch_assoc()) {
		           $data[] = $row;
		    }
			return $data;
		} 
	}

	// Afiseaza datele din tabelul intrari
	public function afiseazaDateleByID($id) {
		    $query = "SELECT * FROM intrari WHERE id = '$id'";
		    $result = $this->con->query($query);
			if ($result->num_rows > 0) {
				$row = $result->fetch_assoc();
				return $row;
			} else {
				echo "Nu s-a gasit nici o inregistrare!";
			}
	}

	// Actualizeaza intrarile din tabelul intrari
	public function modificaIntrarea($intrare){
			$nume = $this->con->real_escape_string($_POST['mnume']);		
			$descriere = $this->con->real_escape_string($_POST['mdescriere']);
			$adresa = $this->con->real_escape_string($_POST['madresa']);
			$website = $this->con->real_escape_string($_POST['mwebsite']);
			$email = $this->con->real_escape_string($_POST['memail']);
			$telefon = $this->con->real_escape_string($_POST['mtelefon']);
			$id = $this->con->real_escape_string($_POST['id']);

		if (!empty($id) && !empty($intrare)) {
			$query = "UPDATE intrari SET nume = '$nume', descriere = '$descriere', adresa = '$adresa', website = '$website', email = '$email', telefon = '$telefon' WHERE id = '$id'";
			$sql = $this->con->query($query);
			if ($sql == true) {
			    header("Location:index.php?msg2=profil_editare");
			}else{
			    echo "Atentie: actulizarea nu s-a efectuat!";
			}
		}			
	}

	// Sterge intrarile din tabelul intrari
	public function stergeInregistrare($id){

		    $query = "DELETE FROM intrari WHERE id = '$id'";
		    $sql = $this->con->query($query);

			if ($sql == true) {
				header("Location:index.php?msg3=stergere");
			}else{
				echo "Atentie: inregistrarea NU a fost stearsa, incearca din nou!";
			}
	}

	// Functiile pentru ToDoList

	public function introducereToDoList(){

		$task = $this->con->real_escape_string($_POST['task']);
		$id_intrare = $this->con->real_escape_string($_POST['id_intrare']);

		print_r($_POST);

		$query = "INSERT INTO intrari_taskuri(id_intrare,task) VALUES('$id_intrare','$task')";

			$sql = $this->con->query($query);			
			if ($sql == true) {
			    header("Location:profil.php?intrareId=". $id_intrare);
			}else{
			    echo "Nu s-a reusit introducerea task-ului!";
			}

	}

	public function afiseazaToDoList($id){

			$query = "SELECT id, task, data FROM intrari_taskuri WHERE id_intrare = '$id'";
		    $result = $this->con->query($query);		

			if ($result->num_rows > 0) {

		    	$data = array();
		    	
		    	while ($row = $result->fetch_assoc()) {
		           $data[] = $row;
		   		}

				return $data;
			} 
	
	}

}