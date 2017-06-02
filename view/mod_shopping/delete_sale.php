<?php 
	session_start();
	if ($_SESSION['ok'] == "ok") {
		if ($_SESSION['rol_Usuario'] == "Administrador") {
			if (isset($_GET['id_factura_venta'])) {
				$id_factura_venta = $_GET['id_factura_venta'];

				//Abrir la conexión
				include ("../../configuration/open_conexion.php");

				$sql = "SELECT id_producto, cantidad FROM detalle_venta WHERE id_factura_venta = $id_factura_venta";
				$result = pg_query($conexion, $sql);

				while ($row = pg_fetch_array($result)) {
					$id_producto = $row['id_producto'];
					$cantidad = $row['cantidad'];

					$sql1 = "UPDATE producto SET stock_actual = stock_actual+$cantidad WHERE id_producto = $id_producto";
					$result1 = pg_query($conexion, $sql1);

					echo pg_fetch_array($result1);
				}
				$sql2 = "DELETE FROM detalle_venta WHERE id_factura_venta = $id_factura_venta";
				$result2 = pg_query($conexion, $sql2);

				$sql3 = "DELETE FROM factura_venta WHERE id_factura_venta = $id_factura_venta";
				$result3 = pg_query($conexion, $sql3);

				//Cerrar la conexión
				include ("../../configuration/close_conexion.php");
			}
		}
 ?>
		<meta http-equiv="refresh" content="0; url=sales.php" >
<?php
	}
	else{
		header("location: ../login.php");
	}
 ?>
