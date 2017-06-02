<?php 
	//Cargar el documento de la marca
	if ($_GET['id_marca']) {
		$id_marca = $_GET['id_marca'];

		//Abrir la conexión
		include '../configuration/open_conexion.php';

		//Realizar la consulta
		$sql = "SELECT documento FROM marca WHERE id_marca = $id_marca";
		$result = pg_query($conexion, $sql) or die('La consulta fallo: ' . pg_last_error());
		header("Content-type: application/pdf");

		//Extraer datos de la consulta
		while ($row = pg_fetch_array($result)) {
			$documento = pg_unescape_bytea($row['documento']);
			echo $documento;
			//echo "$row[documento]";
		}
		// libero los resultados para futuras consultas
		pg_free_result($result);

		//Cerar la conexión
		include '../configuration/close_conexion.php';
	}
 ?>