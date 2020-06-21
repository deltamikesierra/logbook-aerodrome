<?php
$oaci = get_oaci();

$lines = array();
$number = 0;
foreach ($oaci as $item) {
	$lines[] = array(
		'number' => $number + 1,
		'code' => $oaci[$number]['Code'],
		'lieu' => $oaci[$number]['Lieu'],
	);
	$number += 1;
}
$oaci_index = array_search('LFLE', array_column($oaci, 'Code'));
?>
