<?php 
	session_start();
	if ($_SESSION['ok'] == "ok") {
		if ($_SESSION['rol_Usuario'] == "Administrador") {
			if (isset($_GET['id_producto'])) {
				$id_factura_venta = $_GET['id_factura_venta'];
				$id_producto = $_GET['id_producto'];
				$cantidad = $_GET['cantidad'];

				//Abrir la conexión
				include ("../../configuration/open_conexion.php");

				$sql = "UPDATE producto SET stock_actual = stock_actual+$cantidad WHERE id_producto = $id_producto";
				$result = pg_query($conexion, $sql);

				$sql1 = "DELETE FROM detalle_venta WHERE id_producto = $id_producto AND id_factura_venta = $id_factura_venta";
				$result1 = pg_query($conexion, $sql1);
 ?>
				<meta http-equiv="refresh" content="0; url=update_sale.php?id_factura_venta=<? echo $id_factura_venta ?>">
 <?php
				//Cerrar la conexión
				include ("../../configuration/close_conexion.php");
			}
		}
		else{
 ?>
			<meta http-equiv="refresh" content="0; url=sales.php" >
<?php
		}
	}
	else{
		header("location: ../login.php");
	}
 ?>