<?php
$flarm = get_flarm();

$lines = array();
$number = 0;
foreach ($flarm as $item) {
	$lines[] = array(
		'number' => $number + 1,
		'id' => $flarm[$number]['id_flarm'],
		'immat' => $flarm[$number]['immat'],
		'type' => $flarm[$number]['model'],
	);
	$number += 1;
}

$ceaf_index = array_search('F-CEAF', array_column($flarm, 'immat'));

?>
