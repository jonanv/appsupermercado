<?php 
	//Cargar la imagen de la marca
	if ($_GET['id_marca']) {
		$id_marca = $_GET['id_marca'];

		//Abrir la conexión
		include '../configuration/open_conexion.php';

		//Realizar la consulta
		$sql = "SELECT imagen FROM marca WHERE id_marca = $id_marca";
		$result = pg_query($conexion, $sql) or die('La consulta fallo: ' . pg_last_error());
		header("Content-type: image/jpeg");
		//header("Content-type: imagen/png");
		//header("Content-type: application/msword");
		//header("Content-type: application/vnd.ms-excel");
		//header("Content-type: application/pdf");
		//header("Content-type: video/mp4");
		#mime

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