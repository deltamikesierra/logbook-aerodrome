<!DOCTYPE html>
<html>
  <?php require_once 'view/template/head.php';?>

  <body onLoad="startClock()" onUnLoad="stopClock()">
    <?php require_once 'view/template/navbar.php';?>
    <!-- CONTENU DE LA PAGE -->
    <div class="container-fluid">
        <?php echo (isset($content)) ? $content : ""; ?>
    </div>
    <!-- PIED DE PAGE -->
    <?php require_once 'view/template/foot.php';?>
  </body>

  <!-- Code javascript général -->
  <?php require_once 'view/template/js.php';?>
  <!-- Code javascript de la page -->
  <?php echo isset($javascript) ? $javascript : ""; ?>
</html>


