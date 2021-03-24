<?php 

// Date de conectare la baza de date
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'personal_crm');

$conexiune = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if (!$conexiune) {
    echo "<h3> Eroare: Nu a fost posibilă conectarea la MySQL." . PHP_EOL. "</h3>";
    echo "<h3> Valoarea errno: " . mysqli_connect_errno() . PHP_EOL . "</h3>";
    echo "<h3> Valoarea error: " . mysqli_connect_error() . PHP_EOL . "</h3>";
    echo "<h3> Trebuie sa instalezi baza de date din folderul config/db.sql</h3>";
    exit;
}

$query = "SET NAMES utf8";
mysqli_query($conexiune, $query);


?>