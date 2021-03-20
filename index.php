<?php

    $titluPagina = "Panou de control - Personal CRM";

    require_once 'elemente/header.php'; // include footer-ul
    ?>

    <!-- include contoare  -->
        <?php include 'elemente/panoudecontrol/contoare_widget.php'; ?>            

    <div class="row mt-3">

        <!-- include lista scurta cu proiecte pe prima pagina  -->
        <div class="col-md-6">
        <?php include 'elemente/panoudecontrol/proiecte_widget.php'; ?>            
        </div>

        <!-- include lista scurta cu proiecte pe prima pagina  -->
        <div class="col-md-6">
        <?php include 'elemente/panoudecontrol/taskuri_widget.php'; ?>           
        </div>

    </div>

    <div class="row">

        <!-- include lista scurta cu proiecte pe prima pagina  -->
        <div class="col-md-6">
        <?php include 'elemente/panoudecontrol/note_widget.php'; ?>            
        </div>

    </div>


<?php include 'elemente/footer.php'; // include footer-ul ?>