<?php

function is_active($page) {
	$context = empty($_POST['context']) ? 'accueil' : $_POST['context'];
	return "nav-item" . (($context == $page) ? " active" : "");
}

?>

<!-- MENU DE NAVIGATION -->

<nav class="navbar navbar-expand-md navbar-light">
  <div class="navbar-brand">
    <img src="static/img/paper-plane-button-blue.png" height="40" title="Accueil">
  </div>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">

<!-- DEBUT DES ELEMENTS DE MENU -->
    <ul class="navbar-nav mr-auto">

      <li class="<?=is_active("logbook")?>">
        <a class="dropdown-item" href="#" onclick="document.getElementById('logbook-form').submit();">Logbook</a>
      </li>
      <li>
        <a class="dropdown-item" href="#" onclick="document.getElementById('oaci-form').submit();">OACI</a>
      </li>
      <li>
        <a class="dropdown-item" href="#" onclick="document.getElementById('flarm-form').submit();">Aéronefs</a>
      </li>

    </ul>

<form id="logbook-form" action="index.php" method="post">
  <input type="hidden" name="action" value="show">
  <input type="hidden" name="context" value="logbook">
</form>

<form id="oaci-form" action="index.php" method="post">
  <input type="hidden" name="action" value="show">
  <input type="hidden" name="context" value="oaci">
</form>

<form id="flarm-form" action="index.php" method="post">
  <input type="hidden" name="action" value="show">
  <input type="hidden" name="context" value="flarm">
</form>


<!-- FIN DES ELEMENTS DE MENU -->
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->


    <ul class="navbar navbar-right">
      <button class="btn btn-outline-secondary"><span id="clock" class="badge badge-secondary">HH:MM</span><span class="badge"> - <?=date("Y-m-d");?></span></button>
    </ul>

<!-- +++++++++++++++++++++++++++++++++++ -->

  </div>
</nav>
