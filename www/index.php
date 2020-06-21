<?php

try {
	// // DEBUG
	// require 'global/get_post.php';
	// INITIALISATION
	if (empty($root)) {
		require 'global/init.php';
	}
	// Méthode GET pour chargement des données par appel extérieur
	if (isset($_GET['action'])) {
		if ($_GET['action'] == 'get') {
			switch ($_GET['context']) {
			case 'logbook':
				echo json_encode(get_logbook($_GET['date']));
				break;
			case 'oaci':
				echo json_encode(get_oaci());
				break;
			case 'flarm':
				echo json_encode(get_flarm());
				break;
			}
		}
	}
	// Méthode POST en interne : affichage logbook / codes OACI / base Flarm-Immat
	else {
		if (!isset($_POST['action'])) {$_POST['action'] = 'show';}
		if (!isset($_POST['context'])) {$_POST['context'] = 'logbbok';}
		// AFFICHAGE DU LOGBOOK
		switch ($_POST['action']) {
		case 'show':
			switch ($_POST['context']) {
			case 'oaci':
				require 'model/oaci.model.php';
				require 'view/oaci.view.php';
				break;
			case 'flarm':
				require 'model/flarm.model.php';
				require 'view/flarm.view.php';
				break;
			case 'logbook':
			default:
				require 'model/logbook.model.php';
				require 'view/logbook.view.php';
				break;
			}
			break;
		}
	}

// throw new Exception("Référence non trouvée", 1);
} catch (Exception $e) {
	echo 'Erreur : ' . $e->getMessage();
}

?>

