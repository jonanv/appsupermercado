<?php 
	//Cargar el video de la marca
	if ($_GET['id_marca']) {
		$id_marca = $_GET['id_marca'];

		//Abrir la conexión
		include '../configuration/open_conexion.php';

		//Realizar la consulta
		$sql = "SELECT video FROM marca WHERE id_marca = $id_marca";
		$result = pg_query($conexion, $sql) or die('La consulta fallo: ' . pg_last_error());
		header("Content-type: video/mp4");

		//Extraer datos de la consulta
		while ($row = pg_fetch_array($result)) {
			$video = pg_unescape_bytea($row['video']);
			echo $video;
			//echo "$row[video]";
		}
		// libero los resultados para futuras consultas
		pg_free_result($result);

		//Cerar la conexión
		include '../configuration/close_conexion.php';
	}
 ?>