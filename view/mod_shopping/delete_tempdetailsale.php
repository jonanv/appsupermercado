<?php 
	session_start();
	if ($_SESSION['ok'] == "ok") {
		if (isset($_GET['codigo'])) {
			$codigo = $_GET['codigo'];

			//Abrir la conexión
			include ("../../configuration/open_conexion.php");

			$sql = "DELETE FROM tempdetalle_venta WHERE codigo = $codigo";
			$result = pg_query($conexion, $sql);
 ?>
			<meta http-equiv="refresh" content="0; url=add_sale.php">
 <?php
			//Cerrar la conexión
			include ("../../configuration/close_conexion.php");
		}
	}
	else{
		header("location: ../login.php");
	}
 ?>