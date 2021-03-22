<?php
require_once "config/bazadedate.php";

class Note {	

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

	// Introduce datele in tabelul note
	public function introducereNota(){
		$nota = $this->con->real_escape_string($_POST['nota']);
		
		$query = "INSERT INTO note(nota) VALUES('$nota')";

			$sql = $this->con->query($query);			
			if ($sql == true) {
			    $_SESSION['notificare'] = "Nota a fost adaugata cu succes";
			}else{
				$_SESSION['eroare'] = "Atentie: Nu s-a reusit introducerea notei!";
			}
	}


	// Pentru lisa notite
	public function afiseazaNotele(){		
		    $query = "SELECT * FROM note";
		    $result = $this->con->query($query);
		
		if ($result->num_rows > 0) {
		    $data = array();
		    while ($row = $result->fetch_assoc()) {
		           $data[] = $row;
		    }
			return $data;
		} 
	}


	// Afiseaza nottile pe ID
	public function afiseazaNoteByID($id) {
		    $query = "SELECT * FROM note WHERE id = '$id'";
		    $result = $this->con->query($query);
			if ($result->num_rows > 0) {
				$row = $result->fetch_assoc();
				return $row;
			} else {
				echo "Nu s-a gasit nici o nota!";
			}
	}

	// Actualizeaza notita 
	public function modificaNota($date){
			$nota = $this->con->real_escape_string($_POST['mnota']);
			$id = $this->con->real_escape_string($_POST['id']);	

		if (!empty($id) && !empty($date)) {
			$query = "UPDATE note SET nota = '$nota' WHERE id = '$id'";
			$sql = $this->con->query($query);
			
			if ($sql == true) {
				$_SESSION['notificare'] = "Nota a fost actualizata";
			    header("Location:note.php");
			}else{
				$_SESSION['eroare'] = "Atentie: Nota NU a fost actualizata, incearca din nou!";
			}
		}			
	}

	// Sterge notita
	public function stergeNota($id){

		    $query = "DELETE FROM note WHERE id = '$id'";
		    $sql = $this->con->query($query);

			if ($sql == true) {
				$_SESSION['notificare'] = "Nota a fost stearsa";
			    header("Location:note.php");
			}else{
				$_SESSION['eroare'] = "Atentie: Nota NU a fost stearsa, incearca din nou!";
			}
	}


}