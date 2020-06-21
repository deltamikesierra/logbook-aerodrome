<?php
ob_start();
?>

<!-- CONTENU -->
<div class="card">

  <div class="card-header">
    <label for="oaci" class="col-2">Rechercher un code OACI</label>
    <select id="oaci-select" class="select2 col-6" >
      <?php option_list($oaci, ['Code', 'Lieu'], $oaci_index)?>
    </select>
  </div>

  <div class="card-body justify-content-center">
    <h2 class="alert alert-primary">Liste des codes OACI</h2>

    <div class="table-responsive">
      <table class="table table-hover table-bordered">
        <thead>
          <tr>
            <th>N°</th> <th>Code</th>  <th>Lieu</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($lines)) {foreach ($lines as $line) {?>
          <tr>
            <td><?=$line['number']?></td>
            <td><?=$line['code']?></td>
            <td><?=$line['lieu']?></td>
          </tr>
          <?php }}?>
        </tbody>
      </table>
    </div>
  </div>

</div>

<!-- Fin de Contenu -->
<?php
$content = ob_get_clean();

ob_start();
?>
<!-- Code javascript de la page -->
<script type="text/javascript">
  $(document).ready(function(){
    $('.select2').select2();
  });
</script>
<!-- Fin du code javascript de la page -->
<?php
$javascript = ob_get_clean();

require 'view/template/template.php';

?>

