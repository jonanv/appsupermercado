<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php 
	session_start();
	if ($_SESSION['ok'] == "ok") {
 ?>
<!DOCTYPE html>
<html>
<head>
<title>Supermercado</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Super Market Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="../public/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="../public/css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="../public/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- js -->
<script src="../public/js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="../public/js/move-top.js"></script>
<script type="text/javascript" src="../public/js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
</head>
	
<body>
<!-- header -->
	<div class="agileits_header">
		<div class="container">
			<div class="agile-login session">
				<ul>
					<li><?php echo "<span>" . $_SESSION['rol_Usuario'] . ": </span>"; ?></li>
					<li><?php echo "<span>" . $_SESSION['nom_Usuario'] . "</span>"; ?></li>
					<li><?php echo "<span>" . $_SESSION['cor_Usuario'] . "</span>"; ?></li>
					<li><a href="close_session.php">Cerrar sesión</a></li>
				</ul>
			</div>
			<!--
			<div class="product_list_header">  
				<form action="#" method="post" class="last"> 
					<input type="hidden" name="cmd" value="_cart">
					<input type="hidden" name="display" value="1">
					<button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
				</form>
			</div>
			-->
			<div class="clearfix"> </div>
		</div>
	</div>

	<div class="logo_products">
		<div class="container">
			<div class="w3ls_logo_products_left1">
			</div>
			<div class="w3ls_logo_products_left">
				<h1><a href="../index.html">Supermercado</a></h1>
			</div>
			<!--
			<div class="w3l_search">
				<form action="#" method="post">
					<input type="search" name="Search" placeholder="Buscar un producto..." required="">
					<button type="submit" class="btn btn-default search" aria-label="Left Align">
						<i class="fa fa-search" aria-hidden="true"></i>
					</button>
					<div class="clearfix"></div>
				</form>
			</div>
			-->
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //header -->
<!-- navigation -->
	<div class="navigation-agileits">
		<div class="container">
			<nav class="navbar navbar-default">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header nav_2">
					<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div> 
				<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
					<ul class="nav navbar-nav">
						<li class="active"><a href="../index.php" class="act">Inicio</a></li>	
						<!-- Mega Menu -->
						<?php 
							include ("menus/menu_visitant.php");
						 ?>
					</ul>
				</div>
			</nav>
		</div>
	</div>
<!-- //navigation -->
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="menuppal.php"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>Atrás</a></li>
				<li><a href="../index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Inicio</a></li>
				<li class="active">Página de registrar nueva compra</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- register -->
	<div class="register">
		<div class="container">
			<h2>Registrar compra aquí</h2>
			<div class="login-form-grids">
				<h5>Información de la compra</h5>
				<form method="post" enctype="multipart/form-data">
					<?php 
						//Abrir la conexión
						include ("../configuration/open_conexion.php");
						$sqlfactura= "SELECT MAX(id_factura_venta) AS maximo FROM factura_venta";
						$resultfactura = pg_query($conexion, $sqlfactura);
						$rowfactura = pg_fetch_array($resultfactura);
					 ?>
					<input type="text" placeholder="Id factura venta" name="id_factura_venta" value="<?=$rowfactura['maximo']+1?>" readonly >
					<?php 
						$sql = "SELECT * FROM empleado WHERE nombre = 'Sistema'";
						$result = pg_query($conexion, $sql);
						$row = pg_fetch_array($result);
					 ?>
					<input type="hidden" placeholder="Cédula" name="id_empleado" value="<?=$row['id_empleado']?>" readonly >
					<input type="text" placeholder="Nombre" name="nombre" value="<?=$_SESSION['nom_Usuario']?>" readonly >
					<?php 
						$correo = $_SESSION['cor_Usuario'];
						$sqlcliente = "SELECT cedula FROM cliente WHERE correo = '$correo'";
						$resulcliente = pg_query($conexion, $sqlcliente);
						$rowcliente = pg_fetch_array($resulcliente);
					 ?>
					 <input type="hidden" placeholder="Cédula" name="cedula" value="<?=$rowcliente['cedula']?>" readonly >

					<input type="text" placeholder="Fecha venta" name="fecha_venta" value="<?=date('Y-m-d') ?>" readonly >

					<input type="submit" name="btnregistred" value="Registrar compra">
				</form>

				
				<form method="post" enctype="multipart/form-data">
					<select name="id_producto" required >
						<option>Producto...</option>
						<?php 
							$sql1 = "SELECT * FROM producto";
							$result1 = pg_query($conexion, $sql1);

							while ($row1 = pg_fetch_array($result1)) {
								echo "
									<option value='$row1[id_producto]'>$row1[nombre]</option>
								";
							}
						 ?>
					</select>
					<input type="number" placeholder="Cantidad" name="cant" required >
					
					<input type="submit" name="btnaddproduct" value="Agregar producto">
				</form>
			</div>
			<div class="agile_top_brands_grids">
				<?php 
					if (isset($_POST['btnaddproduct'])) {
						$codigo = $_POST['id_producto'];

						$sql2 = "SELECT * FROM producto WHERE id_producto = $codigo";
						$result2 = pg_query($conexion, $sql2);

						if (pg_num_rows($result2) == 1) {
							$row2 = pg_fetch_array($result2);
							$producto = $row2['nombre'];
							$cant = $_POST['cant'];
							$valorun = $row2['precio_venta'];
							$subtotal = $row2['precio_venta'] * $cant;

							$sql3 = "SELECT * FROM tempdetalle_venta WHERE codigo = $codigo";
							$result3 = pg_query($conexion, $sql3);

							if (pg_num_rows($result3) == 1) {
								$sql4 = "UPDATE tempdetalle_venta SET cant = '$cant', subtotal = '$subtotal' WHERE codigo = $codigo";
								$result4 = pg_query($conexion, $sql4); 
							}else{
								$sql4 = "INSERT INTO tempdetalle_venta (codigo, producto, cant, valorun, subtotal) VALUES ('$codigo', '$producto', '$cant', '$valorun', '$subtotal')";
								$result4 = pg_query($conexion, $sql4); 
							}
						}
					}
					//Cerrar la conexión
					include ("../configuration/close_conexion.php");
				 ?>
				<table class="list">
					<thead>
						<tr>
							<th>Código</th>
							<th>Producto</th>
							<th>Cantidad</th>
							<th>Valor unid</th>
							<th>Subtotal</th>
							<th>Eliminar</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							//Abrir la conexión
							include ("../configuration/open_conexion.php");

							$sql = "SELECT * FROM tempdetalle_venta ORDER BY codigo ASC";
							$result = pg_query($conexion, $sql);

							while ($row = pg_fetch_array($result)) {
						 ?>
						<tr>
							<td><?=$row['codigo']?></td>
							<td><?=$row['producto']?></td>
							<td><?=$row['cant']?></td>
							<td><?=$row['valorun']?></td>
							<td><?=$row['subtotal']?></td>
							<td>
								<a href="delete_tempdetailsale.php?codigo=<?=$row['codigo']?>" ><span class="glyphicon glyphicon-trash"></span></a>
							</td>
						</tr>
						<?php 
							}
						 ?>
						<tr>
							<td colspan="5" align="right">Total: 
								<?php 
									$s = "SELECT SUM(subtotal) AS suma FROM tempdetalle_venta";
									$r = pg_query($conexion, $s);
									$ro = pg_fetch_array($r);
									echo $ro['suma'];
								 ?>
							</td>
						</tr>
						<?php
							//Cerrar la conexión
							include ("../configuration/close_conexion.php");
						 ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<?php 
		//Abrir la conexión
		include ("../configuration/open_conexion.php");

		//Insertar la venta
		if (isset($_POST['btnregistred'])) {
			$id_factura_venta = $_POST['id_factura_venta'];
			$id_empleado = $_POST['id_empleado'];
			$cedula = $_POST['cedula'];

			$sql = "INSERT INTO factura_venta(id_empleado, cedula, fecha_venta) VALUES($id_empleado, $cedula, CURRENT_TIMESTAMP)";
			$result = pg_query($conexion, $sql);

			if ($result >= 1) {
				$sql1 = "SELECT * FROM tempdetalle_venta";
				$result1 = pg_query($conexion, $sql1);

				while ($row = pg_fetch_array($result1)) {
					$codigo = $row['codigo'];
					$valorun = $row['valorun'];
					$cant = $row['cant'];

					$sql2 = "INSERT INTO detalle_venta(id_factura_venta, id_producto, valor, cantidad) VALUES('$id_factura_venta', '$codigo', '$valorun', '$cant')";
					$result2 = pg_query($conexion, $sql2);

					$sql3 = "UPDATE producto SET stock_actual=stock_actual-$cant WHERE id_producto = $codigo";
					$result3 = pg_query($conexion, $sql3);
				}
				$sql4 = "TRUNCATE TABLE tempdetalle_venta";
				$result4 = pg_query($conexion, $sql4);

				echo "<script type='text/javascript'>";
				echo "alert('Compra ingresada con éxito!');";
				echo "window.location.replace('menuppal.php');";
				echo "</script>";	
			}
			else{
				echo "<script type='text/javascript'>";
				echo "alert('No se pudo insertar datos de la compra...');";
				echo "</script>";		
			}
		}
		//Cerrar la conexón
		include ("../configuration/close_conexion.php");
	 ?>

<!-- //register -->
<!-- //footer -->
<div class="footer">
		<div class="footer-copy">
			<div class="container">
				<p>© 2017 Super Market. All rights reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></p>
			</div>
		</div>
		
	</div>	
	<div class="footer-botm">
			<div class="container">
				<div class="autores">
					<p>Realizado por: Johanny Vargas González, Juan Bernardo Ocampo Botero, Juan Sebastian Muñoz.</p>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
<!-- //footer -->	
<!-- Bootstrap Core JavaScript -->
<script src="../public/js/bootstrap.min.js"></script>
<!-- top-header and slider -->
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->
<script src="../public/js/minicart.min.js"></script>
<script>
	// Mini Cart
	paypal.minicart.render({
		action: '#'
	});

	if (~window.location.search.indexOf('reset=true')) {
		paypal.minicart.reset();
	}
</script>
<!-- main slider-banner -->
<script src="../public/js/skdslider.min.js"></script>
<link href="../public/css/skdslider.css" rel="stylesheet">
<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery('#demo1').skdslider({'delay':5000, 'animationSpeed': 2000,'showNextPrev':true,'showPlayButton':true,'autoSlide':true,'animationType':'fading'});
						
			jQuery('#responsive').change(function(){
			  $('#responsive_wrapper').width(jQuery(this).val());
			});
			
		});
</script>
<!-- //main slider-banner --> 
</body>
</html>
<?php 
	}
	else{
		header("location: ../login.php");
	}
 ?>