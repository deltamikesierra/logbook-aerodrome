<?php
echo "GET -> ";
echo var_dump($_GET);
echo "<br>";
echo "POST -> ";
echo var_dump($_POST);
echo "<br>";
if (isset($_SESSION)) {
	echo "SESSION -> ";
	echo var_dump($_SESSION);
	echo "<br>";
}

?>
