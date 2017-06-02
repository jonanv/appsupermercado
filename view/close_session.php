<?php

	session_start();
	
	unset($_SESSION['cor_Usuario']);
	unset($_SESSION['nom_Usuario']);
	unset($_SESSION['rol_Usuario']);
	
	session_destroy();
	
	echo "<script type='text/javascript'>";
	echo "window.location.replace('../index.php');";
	echo "</script>";

?>