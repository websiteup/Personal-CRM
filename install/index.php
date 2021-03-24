<?php

//
//
//	 Deocamndata nu functioneaza functia install !!!!!!!!!!
//


// Apeleaza fisierul config
 require_once('../bazadedate.php');


// Creare conexiune la baza de date
$con = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD);

// Verifica conexiunea
if($con->connect_error){
    die("Eroare: Nu se poate conectarea la baza de date. " . $con->connect_error);
}

// Selecteaza baza de date
$db_selected = mysqli_select_db($con, DB_NAME);

// Creaza baza de date in caz ca nu exista
if (!$db_selected) {

	$sql = "CREATE DATABASE " . DB_NAME;

	if ($con->query($sql) === TRUE) {
  		echo "Baza de date a fost creat cu succes </br>";
	} else {
 		echo "Eroare la creare bazei de date: " . $con->error;
	}
}

// Creaza tabelele baza de date in caz ca nu exista
$con = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

	$sql = "CREATE TABLE `clienti` (
			  `id` int(11) NOT NULL,
			  `nume` varchar(100) NOT NULL,
			  `descriere` text NOT NULL,
			  `adresa` varchar(250) NOT NULL,
			  `proiecte` varchar(255) NOT NULL,
			  `email` varchar(50) NOT NULL,
			  `telefon` varchar(20) NOT NULL,
			  `data` datetime NOT NULL DEFAULT current_timestamp()
			) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

	$sql.= "INSERT INTO `clienti` (`id`, `nume`, `descriere`, `adresa`, `proiecte`, `email`, `telefon`, `data`) VALUES
			(1, 'ALPHABET INC', 'Mama lui Google', 'Mountain View, California', '', 'contact@google.com', '1-650-253-0000', '2021-03-23 19:26:32'),
			(2, 'S.C. DANTE INTERNATIONAL S.A.', 'Mama lui Emag', 'Soseaua Virtutii, nr. 148, Sector 6, Bucuresti', '', 'contact@emag.ro', '021.200.52.00', '2021-03-23 19:27:51'),
			(3, 'BRD - Groupe Societe Generale', 'Camatari legali', 'Turn BRD - Bd. Ion Mihalache nr. 1-7, sector 1, cod postal 011171, Bucuresti', '', 'mybrdcontact@brd.ro', '+4 021 302 6161', '2021-03-23 19:31:14'),
			(4, 'Nea Vasile de la taraba', 'Mare samsar de castraveti', 'Piata Sudului', '', 'ceEala@habarnustiu.ro', '0723XXXXXX', '2021-03-23 19:32:39');";

	$sql.= "CREATE TABLE `note` (
			  `id` int(11) NOT NULL,
			  `nota` text NOT NULL,
			  `data` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
			) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

	$sql.= "INSERT INTO `note` (`id`, `nota`, `data`) VALUES
			(1, '<p>There are many variations of passages of Lorem Ipsum available,</p>\r\n\r\n<ol>\r\n	<li>but the majority have suffered alteration in some form,</li>\r\n	<li>by injected humour, or randomised words which don&#39;t look even slightly believable.</li>\r\n	<li>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text.</li>\r\n	<li>All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. T</li>\r\n	<li>he generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</li>\r\n</ol>\r\n', '2021-03-23 23:37:30'),
			(2, '<h2>Where does it come from?</h2>\r\n\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum</p>\r\n', '2021-03-23 23:37:59');";

	$sql.= "INSERT INTO `proiecte` (`id`, `nume`, `link`, `categorie`, `descriere`, `imagine`, `id_client`, `buget`, `status`, `data`, `data_start`, `data_final`) VALUES
			(1, 'Google', 'https://google.com', '7', 'O metoda de a inghesui si mai multe anunturi pe o pagina', 'imagini/google.jpg', 1, 100, 1, '2021-03-23 17:34:05', '2021-03-31', '2021-04-11'),
			(2, 'Emag', 'http://emag.ro', '1', 'Reparare API marketplace', 'imagini/emag.png', 2, 50, 2, '2021-03-23 17:35:14', '2021-03-21', '2021-04-04'),
			(3, 'BRD.ro', 'https://brd.ro', '1', 'Sistem de marire artificiala a comisioanelor ascunse', 'imagini/BRD-Big-logo.jpg', 3, 230, 1, '2021-03-23 17:36:28', '2021-06-19', '2021-08-01'),
			(4, 'femierulcinstit.ro', 'https://brd.ro', '1', 'Magazin online', 'imagini/photo_2020-08-10_22-10-08.jpg', 4, 50, 1, '2021-03-24 10:40:13', '2021-03-23', '2021-04-03'),
			(5, 'PCgarage.ro', 'https://pcgarage.ro', '7', 'Magazin online cu produse IT scumpe', 'imagini/photo_2020-08-18_20-01-25.jpg', 2, 244, 3, '2021-03-24 10:41:59', '2021-03-03', '2021-03-05');
			";

	$sql.= "CREATE TABLE `proiecte_categorii` (
			  `idCategorie` int(11) NOT NULL,
			  `numeCategorie` varchar(300) NOT NULL
			) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

	$sql.= "INSERT INTO `proiecte_categorii` (`idCategorie`, `numeCategorie`) VALUES
			(1, 'Dezvoltare web'),
			(2, 'SEO'),
			(3, 'Mentenanta'),
			(6, 'Mentenanta + SEO'),
			(7, 'Dezvoltare web + Design'); ";

	$sql.= "CREATE TABLE `proiecte_statusuri` (
			  `idStatus` int(11) NOT NULL,
			  `numeStatus` varchar(300) NOT NULL,
			  `culoareStatus` varchar(20) NOT NULL
			) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

	$sql.= "INSERT INTO `proiecte_statusuri` (`idStatus`, `numeStatus`, `culoareStatus`) VALUES
			(1, 'neinceput', '#FF4A55'),
			(2, 'in lucru', '#87CB16'),
			(3, 'finalizat', '#1D62F0'); ";

	$sql.= "CREATE TABLE `proiecte_taskuri` (
			  `id` int(11) NOT NULL,
			  `id_proiect` int(11) NOT NULL,
			  `task` text NOT NULL,
			  `status` int(3) NOT NULL,
			  `prioritate` int(3) NOT NULL,
			  `data` datetime NOT NULL DEFAULT current_timestamp()
			) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

	$sql.= "INSERT INTO `proiecte_taskuri` (`id`, `id_proiect`, `task`, `status`, `prioritate`, `data`) VALUES
			(1, 1, 'It was popularised in the 1960s with the release of Letraset sheets containing', 0, 0, '2021-03-24 01:38:27'),
			(2, 1, 'cted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.', 0, 0, '2021-03-24 01:38:39'),
			(3, 1, 'All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary,', 1, 0, '2021-03-24 01:38:48'),
			(4, 2, '\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium', 1, 0, '2021-03-24 01:43:17'),
			(5, 2, 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born', 1, 0, '2021-03-24 01:43:26'),
			(6, 2, 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the momen', 0, 0, '2021-03-24 01:43:38'),
			(7, 3, 'Every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations ', 0, 0, '2021-03-24 01:44:03'),
			(8, 3, 'Et harum quidem rerum facilis est et expedita distinctio', 1, 0, '2021-03-24 01:44:10'),
			(9, 3, 'Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.', 0, 0, '2021-03-24 01:44:30');
			";

	$sql.= "CREATE TABLE `utilizatori` (
			  `id` int(11) NOT NULL,
			  `utilizator` varchar(30) NOT NULL,
			  `parola` varchar(30) NOT NULL,
			  `nume` varchar(100) NOT NULL,
			  `prenume` varchar(100) NOT NULL
			) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

	$sql.= "INSERT INTO `utilizatori` (`id`, `utilizator`, `parola`, `nume`, `prenume`) VALUES
			(1, 'admin', '1234', 'Paul', 'Petre'),
			(2, 'operator1', 'password', 'Popescu', 'Ion');";

	$sql.= "ALTER TABLE `clienti` ADD PRIMARY KEY (`id`);
			ALTER TABLE `note` ADD PRIMARY KEY (`id`);
			ALTER TABLE `proiecte` ADD PRIMARY KEY (`id`);
			ALTER TABLE `proiecte_categorii` ADD PRIMARY KEY (`idCategorie`);
			ALTER TABLE `proiecte_statusuri` ADD PRIMARY KEY (`idStatus`);
			ALTER TABLE `proiecte_taskuri` ADD PRIMARY KEY (`id`);
			ALTER TABLE `utilizatori` ADD PRIMARY KEY (`id`);
			";

	$sql.= "ALTER TABLE `clienti` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
		    ALTER TABLE `note` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
		    ALTER TABLE `proiecte` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
		    ALTER TABLE `proiecte_categorii` MODIFY `idCategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
		    ALTER TABLE `proiecte_statusuri` MODIFY `idStatus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
		    ALTER TABLE `proiecte_taskuri` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
		    ALTER TABLE `utilizatori` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
		    COMMIT;
  			";



	if ($con->query($sql) === TRUE) {
		echo "Tabelele au fost create cu succes </br>";
		header('Refresh: 3; url=../index.php');
	} else {
		echo "Eroare la crearea tabelului: " . $con->error;
	}
?>