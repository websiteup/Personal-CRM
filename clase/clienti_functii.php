<?php
require_once "config/bazadedate.php";

class Clienti {	

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

//** Clienti **

	// Introduce datele in tabelul clienti
	public function introducereDateClient(){
		$nume = $this->con->real_escape_string($_POST['nume']);		
		$descriere = $this->con->real_escape_string($_POST['descriere']);
		$adresa = $this->con->real_escape_string($_POST['adresa']);
		$email = $this->con->real_escape_string($_POST['email']);
		$telefon = $this->con->real_escape_string($_POST['telefon']);
		
		$query = "INSERT INTO clienti(nume,descriere,adresa,email,telefon) VALUES('$nume','$descriere','$adresa','$email','$telefon')";

			$sql = $this->con->query($query);			
			if ($sql == true) {			   
			    $_SESSION['notificare'] = "Clientul a fost adaugat";
			    header("Location: clienti.php");
			}else{
			    $_SESSION['eroare'] = "Atentie: Nu s-a reusit introducerea clientului!";
			}
	}

	// Arata datele din tabelul clienti mai frumos, elegant, cat de dat
	public function afiseazaClienti(){		
		    $query = "SELECT * FROM clienti";
		    $result = $this->con->query($query);
		
		if (!empty($result) && $result->num_rows > 0) {
		    $data = array();
		    while ($row = $result->fetch_assoc()) {
		           $data[] = $row;
		    }
			return $data;
		}
	}

	// Afiseaza datele clientului din tabelul clienti filtrand pe ID
	public function afiseazaDateClientByID($id) {
		    $query = "SELECT * FROM clienti WHERE id = '$id'";
		    $result = $this->con->query($query);
			if (!empty($result) && $result->num_rows > 0) {
				$row = $result->fetch_assoc();
				return $row;
			} else {
				echo "Nu s-a gasit nici un client!";
			}
	}
	// Afiseaza doar numele clientului
	public function afiseazaNumeClient($id) {
		    $query = "SELECT * FROM clienti WHERE id = '$id'";
		    $result = $this->con->query($query);

		    while($row = mysqli_fetch_assoc($result)) {
			echo $row['nume'];
			}
	}

	// Actualizeaza datele din tabelul clienti
	public function modificaClient($client){
			$nume = $this->con->real_escape_string($_POST['mnume']);		
			$descriere = $this->con->real_escape_string($_POST['mdescriere']);
			$adresa = $this->con->real_escape_string($_POST['madresa']);
			$proiecte = $this->con->real_escape_string($_POST['mproiecte']);
			$email = $this->con->real_escape_string($_POST['memail']);
			$telefon = $this->con->real_escape_string($_POST['mtelefon']);
			$id = $this->con->real_escape_string($_POST['id']);

		if (!empty($id) && !empty($client)) {
			$query = "UPDATE clienti SET nume = '$nume', descriere = '$descriere', adresa = '$adresa', proiecte = '$proiecte', email = '$email', telefon = '$telefon' WHERE id = '$id'";
			$sql = $this->con->query($query);
			if ($sql == true) {				
			    $_SESSION['notificare'] = "Clientul a fost actualizat";
			    header("Location:clienti.php");
			}else{
				$_SESSION['eroare'] = "Atentie: actualizarea NU s-a efectuat!";
			}
		}			
	}

	// Sterge randul din tabelul clienti
	public function stergeClient($id){

		    $query = "DELETE FROM clienti WHERE id = '$id'";
		    echo $query;
		    $sql = $this->con->query($query);

			if ($sql == true) {
				$_SESSION['notificare'] = "Clientul a fost sters";
				header("Location: clienti.php");
			}else{
				$_SESSION['eroare'] = "Atentie: Clientul NU a fost sters, incearca din nou!";
			}
	}
	
}