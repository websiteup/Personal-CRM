<?php
  
  require_once "config/bazadedate.php";

  $contoareObj = new Contoare();

  

?>

<div class="row">
    <div class="col-md-3">
      <div class="card-counter primary">
        <i class="fa fa-users"></i>       
        <span class="count-numbers"><?php $contoareObj->afiseazaContor('clienti'); ?></span>
        <span class="count-name">Clienti</span>    
      </div>
    </div>

    <div class="col-md-3">
      <div class="card-counter danger">
        <i class="fas fa-globe"></i>
        <span class="count-numbers"><?php $contoareObj->afiseazaContor('proiecte'); ?></span>
        <span class="count-name">Proiecte</span>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card-counter success">
        <i class="fas fa-tools"></i>
        <span class="count-numbers">6875</span>
        <span class="count-name">Suma totala proiecte nefinalizate</span>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card-counter info">
        <i class="fas fa-user-check"></i>
        <span class="count-numbers"><?php $contoareObj->afiseazaContor('proiecte_taskuri'); ?></span>
        <span class="count-name">Taskuri rezolvate</span>
      </div>
    </div>
</div>