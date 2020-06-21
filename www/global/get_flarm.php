<?php

require_once 'config.php';
/*
Contenu extrait par l'url : https://ddb.glidernet.org/download/

#DEVICE_TYPE,DEVICE_ID,AIRCRAFT_MODEL,REGISTRATION,CN,TRACKED,IDENTIFIED
'F','000000','HPH 304CZ-17','OK-7777','KN','Y','Y'
'F','000002','LS-6 18','OY-XRG','G2','Y','Y'
'F','00000D','Ka-8','D-1749','W5','Y','Y'
...

Correspondance champ json / indices csv :
1 => 'id_flarm'
3 => 'immat'
2 => 'model'

 */

// Chargement des données sur l'url glidernet
$url = "https://ddb.glidernet.org/download/";
$data = file_get_contents($url);
$array = explode("\n", $data);
// sans la 1ère ligne ni la dernière
unset($array[count($array) - 1]);
unset($array[0]);

$json = array();

foreach ($array as $line) {
	$csv = str_getcsv($line, ",", "'");
	$json[] = array(
		'id_flarm' => $csv[1],
		'immat' => $csv[3],
		'model' => $csv[2],
	);
}
echo "<h1>Importation de la base de connaissance flarm effectuée</h1>";

$file = $data_dir . 'Flarm.json';
file_put_contents($file, json_encode($json));

?>
