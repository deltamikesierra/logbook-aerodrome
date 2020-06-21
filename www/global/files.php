<?php
//  UTILITAIRES FICHIERS
//------------------------

//  LISTE DES FICHIERS D'UN REPERTOIRE - EXTENSION EN OPTION
function list_files($path, $ext = null) {
	$list = array();
	if ($dir = opendir($path)) {
		while ($f = readdir($dir)) {
			if (is_file($path . '/' . $f) && $f[0] != '.') {
				if ($ext) {
					if (pathinfo($f, PATHINFO_EXTENSION) == $ext) {
						$list[] = $f;
					}
				} else {
					$list[] = $f;
				}
			}
		}
	}
	sort($list);
	return $list;
}

//  LISTE DES REPERTOIRES D'UN REPERTOIRE - EXTENSION EN OPTION
function list_dirs($path) {
	$list = array();
	if ($dir = opendir($path)) {
		while ($f = readdir($dir)) {
			if (is_dir($path . '/' . $f) && $f[0] != '.') {
				$list[] = $f;
			}
		}
	}
	sort($list);
	return $list;
}

?>
