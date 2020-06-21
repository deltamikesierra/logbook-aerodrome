<?php

function get_oaci() {
	global $data_dir;
	$oaci = array();
	$file = $data_dir . 'OACI.json';
	if (is_file($file)) {
		if ($json_source = file_get_contents($file)) {
			$oaci = json_decode($json_source, true);
		}
	}
	return $oaci;
}

function get_logbook($date) {
	global $data_dir;
	$logbook = array();
	if (is_null($date)) {$date = date("Y-m-d");}
	$file = $data_dir . "Fls" . date("Ymd", strtotime($date)) . ".json";
	if (is_file($file)) {
		$logbook = file_get_contents($file);
		if ($logbook) {
			$logbook = json_decode($logbook, true);
		}
	}
	return $logbook;
}

function get_flarm() {
	global $data_dir;
	$flarm = array();
	$file = $data_dir . "Flarm.json";
	if (is_file($file)) {
		$flarm = file_get_contents($file);
		if ($flarm) {
			$flarm = json_decode($flarm, true);
		}
	}
	return $flarm;
}

?>

