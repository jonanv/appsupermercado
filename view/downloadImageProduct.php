<?php
	//Cargar la imagen del producto
	if ($_GET['id_producto']) {
		$id_producto = $_GET['id_producto'];

		//Abrir la conexión
		include '../configuration/open_conexion.php';

		//Realizar la consulta
		$sql = "SELECT imagen FROM producto WHERE id_producto = $id_producto";
		$result = pg_query($conexion, $sql) or die('La consulta fallo: ' . pg_last_error());
		header("Content-type: image/jpeg");

		//Extraer datos de la consulta
		while ($row = pg_fetch_array($result)) {
			$imagen = pg_unescape_bytea($row['imagen']);
			echo $imagen;
			//echo "$row[imagen]";
		}
		// libero los resultados para futuras consultas
		pg_free_result($result);

		//Cerar la conexión
		include '../configuration/close_conexion.php';
	}
 ?>