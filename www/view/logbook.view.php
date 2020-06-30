<?php
ob_start();
?>

<!-- CONTENU -->
<div class="card">

  <div class="card-header">
    <form id="select-form" action="index.php" method="post" class="row">
      <input type="hidden" name="action" value="show">
      <input type="hidden" name="context" value="logbook">
      <div class="col-4">
        <label for="oaci" class="col-2">Lieu</label>
        <input id="oaci" type="hidden" name="oaci" value="">
        <select id="oaci-select" class="select2 col-9" >
          <?php option_list($oaci, ['Code', 'Lieu'], $oaci_index)?>
        </select>
      </div>
      <div class="col-5">
        <div class="btn-group" role="group" aria-label="backward">
          <a id="fbwd" class="btn btn-outline-secondary"><i class="fas fa-fast-backward"></i></a>
          <a id="bwd" class="btn btn-outline-secondary"><i class="fas fa-backward"></i></a>
          <a id="sbwd" class="btn btn-outline-secondary"><i class="fas fa-step-backward"></i></a>
        </div>
        <label for="date">Date</label>
        <input id="date-picker" type="date" name="date" value="<?=$date?>">
        <div class="btn-group" role="group" aria-label="forward">
          <a id="sfwd" class="btn btn-outline-secondary"><i class="fas fa-step-forward"></i></a>
          <a id="fwd" class="btn btn-outline-secondary"><i class="fas fa-forward"></i></a>
          <a id="ffwd" class="btn btn-outline-secondary"><i class="fas fa-fast-forward"></i></a>
        </div>
      </div>
    </form>
  </div>

  <div class="card-body justify-content-cente">
    <h2 class="alert alert-primary">Logbook - <?=$oaci[$oaci_index]['Code']?> - <?=$day?></h2>

    <div class="table-responsive">
      <table class="table table-hover table-bordered">
        <thead>
          <tr>
            <th>N°</th>
            <th>Immat.</th>
            <th>Déc.</th>
            <th>Att.</th>
            <th>Durée</th>
            <th>Mode</th>
            <th>Largage AGL (m)</th>
            <th>Couplage</th>
            <th><span class="badge badge-pill badge-light">Id (flarm)</span></th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($lines)) {foreach ($lines as $line) {?>
          <tr>
            <td><?=$line['number']?></td>
            <td><?=$line['immat']?></td>
            <td><?=$line['hdec']?></td>
            <td><?=$line['hatt']?></td>
            <td><?=$line['duree']?></td>
            <td><?=$line['mode']?></td>
            <td><?=$line['largage']?></td>
            <td><?=$line['couplage']?></td>
            <td><span class="badge badge-pill badge-light"><?=$line['rfid']?></span></td>
          </tr>
          <?php }}?>
        </tbody>
      </table>
    </div>
  </div>

</div>

<!-- Fin de Contenu -->
<?php $content = ob_get_clean();?>
<!-- Code javascript de la page -->
<?php ob_start();?>
<script type="text/javascript">
<?php require 'view/logbook.view.js';?>
</script>
<!-- Fin du code javascript de la page -->
<?php
$javascript = ob_get_clean();
require 'view/template/template.php';
?>


