<?php
// CONSTRUCTION D'UNE LISTE D'OPTIONS
// $elts      = tableau associatif
// $selected  = 1 + numéro d'ordre de l'option choisie dans $elts
// $keys      = liste de clef associées pour le libellé d'une option
// $selected  = n° d'option sélectionnée
function option_list($elts, $keys = [], $selected = -1, $none = true) {
	if ((!$keys) and ($elts)) {$keys = array_keys($elts[0]);}
	if ($none) {?>
    <option value="0">&nbsp;&nbsp;&nbsp;---</option>
    <?php }
	$i = 1;
	foreach ($elts as $elt) {
		$s = "";
		foreach ($keys as $key) {
			$s .= $elt[$key] . '   ';}
		$v = 'value=' . $i . (($i == $selected + 1) ? " selected" : "");
		?>
        <option <?=$v?>> <?=$s?> </option>
    <?php $i++;}
}

?>
