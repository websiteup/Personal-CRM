<?php

    $titluPagina = "Panou de control - Personal CRM";

    require_once 'elemente/header.php'; // include footer-ul
    ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
		<p>Am inceput proiectul ca un CMS, vroiam sa fac un fel de varul de la tara a lui Wordpress dar in timp ce lucram mi-a venit ideea sa fac un CRM pentru mine, poate ma ajuta sa fiu mai ordonat.</p>

		<p>Pentru front end folosesc bootstrap 4, am gasit si un dashboard gratuit <br/>
		- https://github.com/creativetimofficial/light-bootstrap-dashboard</p>

		<p>Am incercat sa folosesc doar HTML, CSS, PHP si MYSQL <br/>
		Javascript am folosit doar pentru CKeditor 4 - https://ckeditor.com/ckeditor-4/</p>
		</div>
	</div>

	<hr>
	
	<p> Link github: <a href="https://github.com/websiteup/Personal-CRM">https://github.com/websiteup/Personal-CRM</a> </p>

	<hr>

	<div class="row">

		<div class="col-md-3">
			<p>Info-- clienti</p>
			<ul>
				<li>id</li>
				<li>nume</li>
				<li>descriere</li>
				<li>adresa</li>
				<li>telefon</li>
				<li>email</li>
				<li>proiecte</li>
				<li>data_adaugarii</li>
			</ul>
		</div>

		<div class="col-md-3">
			<p>-- proiecte</p>
			<ul>
				<li>id</li>
				<li>nume</li>
				<li>link</li>
				<li>descriere</li>
				<li>id_client</li>
				<li>buget</li>
				<li>status - Neinceput, In curs de realizare, Finalizat</li>
				<li>data adaugarii</li>
				<li>data inceperii</li>
				<li>data finalizarii</li>
			</ul>
		</div>

		<div class="col-md-3">
			<p>-- proiecte_taskuri</p>
			<ul>
				<li>id</li>
				<li>id_proiect</li>
				<li>task</li>
				<li>stare</li>
				<li>data adaugarii</li>
				<li>data finalizarii</li>
			</ul>
		</div>
	
	</div>
<hr>

<p>De folosit in proiect</p>
<p>1) Variabile</p>
<ul>
	<li>Boolean (true (1), false (0))</li>
	<li>Integer (10, 20, 15) </li>
	<li>Floating point (float) (12.345, -50.23)</li>
	<li>Array (o variabila cu mai multe valori)</li>
	<li>Multi Array</li>
	<li>Constante</li>
	<li>Superglobale</li>
</ul>

<p>2) Operatori</p>
<ul>
	<li>Aritmetici( +, -, *, /, %)</li>
	<li>De atribuire (=, +=, -=, /=, %=, .=) </li>
	<li>Comparativi (<, >, <=, >=, ==, ===, !=) </li>
	<li>Logici ( ||, &&)</li>
	<li>Concatenare</li>
</ul>

<p>3) If</p>
<ul>
	<li>if(conditie)</li>
	<li>if, else</li>
	<li>if (conditie) ? instructiuni1 : instructiuni2 </li>
	<li>if (conditie1 || conditie2){instructiuni1;}</li>
	<li>if (conditie1 && conditie2){instructiuni1;}</li>
</ul>

<p>4) For </p>

<p>5) While</p>

</div>

<?php include 'elemente/footer.php'; // include footer-ul ?>
