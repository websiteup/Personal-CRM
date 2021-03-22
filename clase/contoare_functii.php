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

    // Afiseaza proiectele in lucru sau neincepute
    public function afiseazaProiecte() {
		$query = "SELECT * FROM proiecte WHERE status = '1' || status = '2'";
   		$result = $this->con->query($query);
   		$numar = mysqli_num_rows($result);

   		echo  "<div class='huge'>{$numar}</div>";
    }

    // Afiseaza suma totala a bugetelor pentru proiectele nefinalizate
    public function afiseazaSumaTotala() {
		$query = "SELECT SUM(buget) AS sumatotala FROM proiecte WHERE status != '3'";
   		$result = $this->con->query($query);
   		$row = mysqli_fetch_assoc($result); 
		$sumatotala = $row['sumatotala'];

   		echo  "<div class='huge'>{$sumatotala} €</div>";
    }

    public function afiseazaTaskuriNerezolvate() {
		$query = "SELECT * FROM proiecte_taskuri WHERE status = '0'";
   		$result = $this->con->query($query);
   		$numar = mysqli_num_rows($result);

   		echo  "<div class='huge'>{$numar}</div>";
    }
}