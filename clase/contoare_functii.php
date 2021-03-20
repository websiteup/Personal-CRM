<?php

require_once "config/bazadedate.php";

class Contoare {	

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

	public function afiseazaContor($tabel) {
		$query = "SELECT * FROM $tabel";
   		$result = $this->con->query($query);
   		$numar = mysqli_num_rows($result);

   		echo  "<div class='huge'>{$numar}</div>";
    }
}