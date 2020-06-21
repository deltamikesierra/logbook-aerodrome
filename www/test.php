<?php
$urls = array(
	"http://logbook.planeur-challes.fr/?action=get&context=logbook&date=2020-06-12",
	// "http://logbook.planeur-challes.fr/?action=get&context=oaci",
	// "http://logbook.planeur-challes.fr/?action=get&context=flarm",
);

foreach ($urls as $url) {
	if ($response = file_get_contents($url)) {
		echo $response;
	} else {
		echo $url . ' - pas de résultat';
	}
}
?>
