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
			<div class="agile-login session session">
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
			<div class="clearfix"></div>
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
				<li><a href="../menuppal.php"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>Atrás</a></li>
				<li><a href="../../index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Inicio</a></li>
				<li class="active">Página de ventas</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
	<!-- //top-header and slider -->
	<!-- top-brands -->
	<div class="top-brands">
		<div class="container">
		<h2>Ventas</h2>
			<div class="grid_3 grid_5">
				<div class="snipcart-details top_brand_home_details">
					<?php 
						if ($_SESSION['rol_Usuario'] == "Empleado") {
					 ?>
							<form method="post">
								<fieldset>
									<input type="submit" name="btnventa" value="Registrar nueva venta" class="new_product button" />
									<?php 
										if (isset($_POST['btnventa'])) {
											echo "<script type='text/javascript'>";
											echo "window.location.replace('add_sale.php');";
											echo "</script>";
										}
									 ?>
								</fieldset>
							</form>
					<?php
						}
					 ?>
				</div>
				<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
					<div id="myTabContent" class="tab-content producto">
						<div role="tabpanel" class="tab-pane fade in active" id="expeditions" aria-labelledby="expeditions-tab">
							<div class="agile_top_brands_grids">
								<?php 
									//Abrir la conexión
									include ("../../configuration/open_conexion.php");

									$sql = "SELECT * FROM factura_venta f INNER JOIN empleado e ON f.id_empleado = e.id_empleado";
									$result = pg_query($conexion, $sql);


									if (pg_num_rows($result) > 0) {
								 ?>
										<table class="list">
											<thead>
												<tr>
													<th>Factura</th>
													<th>Empleado</th>
													<th>Cliente</th>
													<th>Fecha</th>
													<th>Nro productos</th>
													<th>Total</th>
													<th>Consultar</th>
													<?php 
														if ($_SESSION['rol_Usuario'] == "Administrador") {
													 ?>
													<th>Modificar</th>
													<th>Eliminar</th>
													<?php
														}
													 ?>
												</tr>
											</thead>
											<tbody>
								<?php
										$sql1 = "SELECT * FROM cliente c INNER JOIN factura_venta f ON c.cedula = f.cedula";
										$result1 = pg_query($conexion, $sql1);

										while ($row = pg_fetch_array($result) and $row1 = pg_fetch_array($result1)) {
											$id_factura_venta = $row['id_factura_venta'];

											$sql2 = "SELECT COUNT(id_factura_venta) AS nroproductos FROM detalle_venta WHERE id_factura_venta = $id_factura_venta";
											$result2 = pg_query($conexion, $sql2);
											$row2 = pg_fetch_array($result2);

											$sql3 = "SELECT SUM(valor * cantidad) AS total FROM detalle_venta WHERE id_factura_venta = $id_factura_venta";
											$result3 = pg_query($conexion, $sql3);
											$row3 = pg_fetch_array($result3);
								 ?>
												<tr>
													<td><?=$row['id_factura_venta']?></td>
													<td><?=$row['nombre'] . " " . $row['apellido']?></td>
													<td><?=$row1['nombre'] . " " . $row1['apellido']?></td>
													<td><?=$row['fecha_venta']?></td>
													<td><?=$row2['nroproductos']?></td>
													<td><?=$row3['total']?></td>
													<td>
														<a href="read_sale.php?id_factura_venta=<?=$row['id_factura_venta']?>" ><span class="glyphicon glyphicon-zoom-in"></span></a>
													</td>
													<?php 
														if ($_SESSION['rol_Usuario'] == "Administrador") {
													 ?>
													<td>
														<a href="update_sale.php?id_factura_venta=<?=$row['id_factura_venta']?>" ><span class="glyphicon glyphicon-pencil"></span></a>
													</td>
													<td>
														<a href="delete_sale.php?id_factura_venta=<?=$row['id_factura_venta']?>" ><span class="glyphicon glyphicon-trash"></span></a>
													</td>
													<?php
														}
													 ?>
												</tr>
								<?php
										}
								 ?>
											</tbody>
								 		</table>
										<div class="clearfix"> </div>
								<?php
									}
									else{
								 ?>
										<center>
											<h3>Sin resultados</h3>
										</center>
								<?php
									}
									//Cerrar la conexión
									include ("../../configuration/close_conexion.php");
								 ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- //footer -->
<div class="footer">
		<!--<div class="container">
			<div class="w3_footer_grids">
				<div class="col-md-3 w3_footer_grid">
					<h3>Contact</h3>
					<ul class="address">
						<li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>1234k Avenue, 4th block, <span>New York City.</span></li>
						<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:info@example.com">info@example.com</a></li>
						<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+1234 567 567</li>
					</ul>
				</div>
				<div class="col-md-3 w3_footer_grid">
					<h3>Information</h3>
					<ul class="info"> 
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="about.html">About Us</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="contact.html">Contact Us</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="short-codes.html">Short Codes</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="faq.html">FAQ's</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="products.html">Special Products</a></li>
					</ul>
				</div>
				<div class="col-md-3 w3_footer_grid">
					<h3>Category</h3>
					<ul class="info"> 
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="groceries.html">Groceries</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="household.html">Household</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="personalcare.html">Personal Care</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="packagedfoods.html">Packaged Foods</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="beverages.html">Beverages</a></li>
					</ul>
				</div>
				<div class="col-md-3 w3_footer_grid">
					<h3>Profile</h3>
					<ul class="info"> 
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="products.html">Store</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="checkout.html">My Cart</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="login.html">Login</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="registered.html">Create Account</a></li>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>-->
		
		<div class="footer-copy">
			<div class="container">
				<p>© 2017 Super Market. All rights reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></p>
			</div>
		</div>
</div>	
<div class="footer-botm">
	<div class="container">
		<!--
		<div class="w3layouts-foot">
			<ul>
				<li><a href="#" class="w3_agile_facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
				<li><a href="#" class="agile_twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
				<li><a href="#" class="w3_agile_dribble"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
				<li><a href="#" class="w3_agile_vimeo"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
			</ul>
		</div>
		<div class="payment-w3ls">	
			<img src="images/card.png" alt=" " class="img-responsive">
		</div>
		-->
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