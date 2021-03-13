<?php

// Apeleaza fisierul config
 require_once('../config.php');


// Creare conexiune la baza de date
$con = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD);

// Verifica conexiunea
if($con->connect_error){
    die("Eroare: Nu se poate conectarea la baza de date. " . $con->connect_error);
}

// Selecteaza baza de date
$db_selected = mysqli_select_db($con, DB_BASE);

// Creaza baza de date in caz ca nu exista
if (!$db_selected) {

	$sql = "CREATE DATABASE " . DB_BASE;

	if ($con->query($sql) === TRUE) {
  		echo "Baza de date a fost creat cu succes </br>";
	} else {
 		echo "Eroare la creare bazei de date: " . $con->error;
	}
}

// Creaza tabelele baza de date in caz ca nu exista
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_BASE);

	$sql = "CREATE TABLE `lista` (
	    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	    nume VARCHAR(100) NOT NULL,
	    descriere TEXT NOT NULL,
	    adresa VARCHAR(250) NOT NULL,
	    website VARCHAR(100) NOT NULL,
	    email VARCHAR(50) NOT NULL,
	    telefon INT(10) NOT NULL
	)";

	if ($con->query($sql) === TRUE) {
		echo "Tabelul a fost creat cu succes </br>";
		header('Refresh: 3; url=../index.php');
	} else {
		echo "Eroare la crearea tabelului: " . $con->error;
	}
?>