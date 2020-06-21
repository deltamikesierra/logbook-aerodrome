<?php

function hms_to_hm($hms) {
	$h = date("H", strtotime($hms));
	$m = date("i", strtotime($hms));
	$s = date("s", strtotime($hms));
	if ($s > 30) {$m += 1;}
	$s = 0;
	return date("H:i", strtotime($h . ":" . $m . ":" . $s));
}

function delta_hm($hms1, $hms2) {
	$dt1 = strtotime(hms_to_hm($hms1));
	$dt2 = strtotime(hms_to_hm($hms2));
	$delta = $dt2 - $dt1;
	return hms_to_hm(gmdate('H:i:s', $delta));
}

// Jour d'affichage : indiqué par POST, par défaut aujourd'hui
$date = (isset($_POST['date'])) ? $_POST['date'] : date("Y-m-d");
$day = strftime('%A %d %B %Y', strtotime($date));

// Liste des fichiers disponibles
$files = list_files($data_dir, 'json');
if ($files) {
	rsort($files);
}

// logbook du jour - vide si pas d'activité ou si pas de fichier
$logbook = get_logbook(isset($_POST['date']) ? $_POST['date'] : null);
// $logbook = get_logbook("2020-06-06");

$lines = array();
$number = 0;
if (($logbook) && ($vols = $logbook['vols'])) {
	foreach ($vols as $lb) {
		$number += 1;

		$hdec = hms_to_hm($lb['Deco']);
		$hatt = ($lb['Atterro']) ? hms_to_hm($lb['Atterro']) : "";
		$duree = ($hatt) ? delta_hm($lb['Deco'], $lb['Atterro']) : "";

		$lines[] = array(
			'number' => $number,
			'immat' => $lb['Aeronef'],
			'rfid' => $lb['RFID'],
			'hdec' => $hdec,
			'hatt' => $hatt,
			'duree' => $duree,
			'mode' => $lb['Mode'],
			'largage' => $lb['HautLarg'] ? round($lb['HautLarg'] / 3) : "-",
			'couplage' => $lb['Couple'] ? $lb['Couple'] : "-",
		);
	}
}

$oaci = get_oaci();
$oaci_index = array_search('LFLE', array_column($oaci, 'Code'));
?>
