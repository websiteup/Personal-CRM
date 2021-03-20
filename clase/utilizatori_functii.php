<?php

require_once "config/bazadedate.php";

class Utilizatori {	

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

	public function verificaAutentificare($utilizator, $parola){
 
        $sql = "SELECT * FROM utilizatori WHERE utilizator = '$utilizator' AND parola = '$parola'";
        $query = $this->con->query($sql);
 
        if (!empty($result) && $result->num_rows > 0) {
            $row = $query->fetch_array();
            return $row['id'];
        }
        else{
            return false;
        }
    }
 
    public function afiseazaDateUtilizator($id){
 
        $query = "SELECT * FROM utilizatori WHERE id = '$id'";
	    
	    $result = $this->con->query($query);
		
		if (!empty($result) && $result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		}
    }

    public function escape_string($value){
 
        return $this->con->real_escape_string($value);
    }

}