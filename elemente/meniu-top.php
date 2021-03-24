<div class="main-panel">
	
	<!-- Navbar -->
	<nav class="navbar navbar-expand-lg " color-on-scroll="500">
	    <div class="container-fluid">
	        <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
	            <span class="navbar-toggler-bar burger-lines"></span>
	            <span class="navbar-toggler-bar burger-lines"></span>
	            <span class="navbar-toggler-bar burger-lines"></span>
	        </button>
	        <div class="collapse navbar-collapse justify-content-end" id="navigation">
	            <ul class="navbar-nav ml-auto">
	                <li class="nav-item">
	                    <a class="nav-link" href="utilizator_profil.php">
	                    	<i class="fas fa-user"></i>
	                        <span class="no-icon"><?php $utilizatoriObj->afiseazaNumeUtilizator($_SESSION['utilizator']); ?></span>
	                    </a>
	                </li>
	                <li class="nav-item">
	                    <a class="nav-link" href="utilizator_iesire.php">
	                    	<i class="fas fa-sign-out-alt"></i>
	                        <span class="no-icon">Iesire din cont</span>
	                    </a>
	                </li>
	            </ul>
	        </div>
	    </div>
	</nav>
	<!-- End Navbar -->