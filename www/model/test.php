<?php

setlocale(LC_TIME, "fra", "fr_FR");

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
	echo ' ====' . date('H:i:s', $delta) . "\n";
	echo ' ====' . hms_to_hm(date('H:i:s', $delta)) . "\n";
	return hms_to_hm(date('H:i:s', $delta));
}

$hd = "19:00:58";
$ha = "20:50:00";

echo $hd . ' -- ' . $ha . "<br>";
$hdec = hms_to_hm($hd);
$hatt = ($ha) ? hms_to_hm($ha) : "";
$delta_hm = ($hatt == "") ? "" : delta_hm($hd, $ha);
echo $hdec . ' -- ' . $hatt . '-->> ' . $delta_hm . "<br>";

?>
