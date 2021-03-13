<?php 

// Date de conectare la baza de date
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'devlist');

$conexiune = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

$query = "SET NAMES utf8";
mysqli_query($conexiune, $query);

// if($connection) {
// 	echo "Esti conectat NEO !";
// }

?>