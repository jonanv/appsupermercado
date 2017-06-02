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
<link href="../../public/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="../../public/css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="../../public/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- js -->
<script src="../../public/js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="../../public/js/move-top.js"></script>
<script type="text/javascript" src="../../public/js/easing.js"></script>
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
					<li><a href="../close_session.php">Cerrar sesión</a></li>
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
				<h1><a href="../../index.html">Supermercado</a></h1>
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
						<li class="active"><a href="../../index.php" class="act">Inicio</a></li>	
						<!-- Mega Menu -->
						<?php 
							include ("../menus/menu_visitant.php");
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
				<li><a href="products.php"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>Atrás</a></li>
				<li><a href="../../index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Inicio</a></li>
				<li class="active">Página de consultar producto</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- register -->
	<div class="register">
		<div class="container">
			<h2>Consultar producto aquí</h2>
			<div class="login-form-grids">
				<h5>Información del producto</h5>
				<?php 
					//Abrir la conexión
					include ("../../configuration/open_conexion.php");

					$id_producto = $_REQUEST['id_producto'];

					$sql = "SELECT * FROM producto WHERE id_producto = $id_producto";
					$result = pg_query($conexion, $sql);

					while ($row = pg_fetch_array($result)) {
				 ?>
				<form method="post" enctype="multipart/form-data">
					<input type="text" placeholder="Nombre" name="nombre" value="<?=$row['nombre']?>" readonly >
					<input type="number" placeholder="Stock mínimo" name="stock_min" value="<?=$row['stock_min']?>" readonly >
					<input type="number" placeholder="Stock máximo" name="stock_max" value="<?=$row['stock_max']?>" readonly >
					<input type="number" placeholder="Stock actual" name="stock_actual" value="<?=$row['stock_actual']?>" readonly >
					<input type="number" placeholder="Precio de compra" name="precio_compra" value="<?=$row['precio_compra']?>" readonly>
					<input type="number" placeholder="Precio de venta" name="precio_venta" value="<?=$row['precio_venta']?>" readonly>

					<center>
						<img src="../downloadImageProduct.php?id_producto=<?=$row['id_producto']?>" align="middle" >
					</center>
					

					<select name="nit" disabled >
						<option selected>Proveedor...</option>
						<?php 
							$sql1 = "SELECT nit, nombre, apellido FROM proveedor";
							$result1 = pg_query($conexion, $sql1);

							while ($row1 = pg_fetch_array($result1)) {
								if ($row['nit'] == $row1['nit']) {
									echo "
										<option value='$row1[nit]' selected>$row1[nombre] $row1[apellido]</option>
									";
								}
								else{
									echo "
										<option value='$row1[nit]'>$row1[nombre] $row1[apellido]</option>
									";
								}
							}
						 ?>
					</select>
					<select name="id_marca" disabled >
						<option selected>Marca...</option>
						<?php 
							$sql2= "SELECT id_marca, nombre FROM marca";
							$result2 = pg_query($conexion, $sql2);

							while ($row2 = pg_fetch_array($result2)) {
								if ($row['id_marca'] == $row2['id_marca']) {
									echo "
										<option value='$row2[id_marca]' selected>$row2[nombre]</option>
									";
								}
								else{
									echo "
										<option value='$row2[id_marca]'>$row2[nombre]</option>
									";
								}
							}
						 ?>
					</select>
					<select name="id_categoria" disabled >
						<option selected>Categoria...</option>
						<?php 
							//$marca_categoria = $_POST['marca_categoria'];
							$sql3 = "SELECT id_categoria, nombre FROM categoria";
							$result3 = pg_query($conexion, $sql3);

							while ($row3 = pg_fetch_array($result3)) {
								if ($row['id_categoria'] == $row3['id_categoria']) {
									echo "
										<option value='$row3[id_categoria]' selected>$row3[nombre]</option>
									";
								}
								else{
									echo "
										<option value='$row3[id_categoria]'>$row3[nombre]</option>
									";
								}
							}
						 ?>
					</select>

					<textarea name="descripcion" placeholder="Descripción" cols="49" rows="5" readonly ><?=$row['descripcion']?></textarea>
					
				</form>
				<?php 
					}
					//Cerrar la conexión
					include ("../../configuration/close_conexion.php");
				 ?>
			</div>
			<div class="register-home">
				<a href="../../index.php">Inicio</a>
			</div>
		</div>
	</div>

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
<script src="../../public/js/bootstrap.min.js"></script>
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
<script src="../../public/js/minicart.min.js"></script>
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
<script src="../../public/js/skdslider.min.js"></script>
<link href="../../public/css/skdslider.css" rel="stylesheet">
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