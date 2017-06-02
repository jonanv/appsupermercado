<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<?php 
	session_start();
	if ($_SESSION['ok'] == "ok") {
 ?>
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
			<div class="agile-login session session">
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
						<li class="active"><a href="../index.php" class="act">Inicio</a></li>	
						<!-- Mega Menu -->
						<?php 
							switch ($_SESSION['rol_Usuario']) {
								case "Administrador":
									include ("menus/menu_administrador.php");
									break;
								case "Empleado":
									include ("menus/menu_employee.php");
									break;
								case "Cliente":
									include ("menus/menu_client.php");
									break;
								default:
									include ("menus/menu_visitant.php");
									break;
							}
						 ?>
					</ul>
				</div>
			</nav>
		</div>
	</div>
		
<!-- //navigation -->
	<!-- main-slider -->
		<ul id="demo1">
			<li>
				<img src="../public/imgs/11.jpg" alt="" />
				<!--Slider Description example-->
				<div class="slide-desc">
					<h3>Comprar productos de arroz ahora están en línea con nosotros</h3>
				</div>
			</li>
			<li>
				<img src="../public/imgs/22.jpg" alt="" />
				  <div class="slide-desc">
					<h3>Productos de especias integrales ahora están en línea con nosotros</h3>
				</div>
			</li>
			
			<li>
				<img src="../public/imgs//44.jpg" alt="" />
				<div class="slide-desc">
					<h3>También hay productos que estan en oferta</h3>
				</div>
			</li>
		</ul>
	<!-- //main-slider -->
	<!-- //top-header and slider -->
	<!-- top-brands -->
	<div class="top-brands">
		<div class="container">
		<h2>Ofertas más vendidas</h2>
			<div class="grid_3 grid_5">
				<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
					<ul id="myTab" class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active"><a href="#expeditions" id="expeditions-tab" role="tab" data-toggle="tab" aria-controls="expeditions" aria-expanded="true">Ofertas anunciadas</a></li>
						<li role="presentation"><a href="#tours" role="tab" id="tours-tab" data-toggle="tab" aria-controls="tours">Ofertas de hoy</a></li>
					</ul>
					<div id="myTabContent" class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="expeditions" aria-labelledby="expeditions-tab">
							<div class="agile-tp">
								<h5>Anunciado esta semana</h5>
								<p class="w3l-ad">Hemos reunido todas nuestras ofertas anunciadas en un solo lugar, por lo que no se perderá mucho.</p>
							</div>
							<div class="agile_top_brands_grids">
								<?php 
									//Abrir la conexión
									include ("../configuration/open_conexion.php");

									//Consulta aleatoria de los prodcutos con limite de 6
									$sql = "SELECT * FROM producto ORDER BY random() LIMIT 6";
									$result = pg_query($conexion, $sql);

									while ($row = pg_fetch_array($result)) {
								 ?>
								<div class="col-md-4 top_brand_left">
									<div class="product hover14 column">
										<div class="agile_top_brand_left_grid">
											<div class="agile_top_brand_left_grid1">
												<figure>
													<div class="snipcart-item block" >
														<div class="snipcart-thumb">
															<img align='middle' src='downloadImageProduct.php?id_producto=<?=$row['id_producto']?>'>
															<p><?=$row['nombre']?></p>
															<div class="stars">
																<i class="fa fa-star blue-star" aria-hidden="true"></i>
																<i class="fa fa-star blue-star" aria-hidden="true"></i>
																<i class="fa fa-star blue-star" aria-hidden="true"></i>
																<i class="fa fa-star blue-star" aria-hidden="true"></i>
																<i class="fa fa-star gray-star" aria-hidden="true"></i>
															</div>
															<h4>$<?=$row['precio_venta']?></h4>
														</div>
														<!--
														<div class="snipcart-details top_brand_home_details">
															<form action="#" method="post">
																<fieldset>
																	<input type="hidden" name="cmd" value="_cart" />
																	<input type="hidden" name="add" value="1" />
																	<input type="hidden" name="business" value=" " />
																	<input type="hidden" name="item_name" value="<?=$row['nombre']?>" />
																	<input type="hidden" name="amount" value="<?=$row['precio_venta']?>" />
																	<input type="hidden" name="discount_amount" value="500.00" />
																	<input type="hidden" name="currency_code" value="USD" />
																	<input type="hidden" name="return" value=" " />
																	<input type="hidden" name="cancel_return" value=" " />
																	<input type="submit" name="submit" value="Add to cart" class="button" />
																</fieldset>
															</form>
														</div>
														-->
													</div>
												</figure>
											</div>
										</div>
									</div>
								</div>
								<?php 
									}
									//Cerrar la conexión
									include ("../configuration/close_conexion.php");
								 ?>
								<div class="clearfix"> </div>
							</div>
						</div>

						<div role="tabpanel" class="tab-pane fade" id="tours" aria-labelledby="tours-tab">
							<div class="agile-tp">
								<h5>Esta semana</h5>
								<p class="w3l-ad">Hemos reunido todas nuestras ofertas anunciadas en un solo lugar, por lo que no se perderá mucho.</p>
							</div>
							<div class="agile_top_brands_grids">
								<?php 
									//Abrir la conexión
									include ("../configuration/open_conexion.php");

									//Consulta aleatoria de los prodcutos con limite de 6
									$sql = "SELECT * FROM producto ORDER BY random() LIMIT 6";
									$result = pg_query($conexion, $sql);

									while ($row = pg_fetch_array($result)) {
								 ?>
								<div class="col-md-4 top_brand_left">
									<div class="product hover14 column">
										<div class="agile_top_brand_left_grid">
											<div class="agile_top_brand_left_grid1">
												<figure>
													<div class="snipcart-item block" >
														<div class="snipcart-thumb">
															<img align='middle' src='downloadImageProduct.php?id_producto=<?=$row['id_producto']?>'>
															<p><?=$row['nombre']?></p>
															<div class="stars">
																<i class="fa fa-star blue-star" aria-hidden="true"></i>
																<i class="fa fa-star blue-star" aria-hidden="true"></i>
																<i class="fa fa-star blue-star" aria-hidden="true"></i>
																<i class="fa fa-star blue-star" aria-hidden="true"></i>
																<i class="fa fa-star gray-star" aria-hidden="true"></i>
															</div>
															<h4>$<?=$row['precio_venta']?></h4>
														</div>
														<!--
														<div class="snipcart-details top_brand_home_details">
															<form action="#" method="post">
																<fieldset>
																	<input type="hidden" name="cmd" value="_cart" />
																	<input type="hidden" name="add" value="1" />
																	<input type="hidden" name="business" value=" " />
																	<input type="hidden" name="item_name" value="<?=$row['nombre']?>" />
																	<input type="hidden" name="amount" value="<?=$row['precio_venta']?>" />
																	<input type="hidden" name="discount_amount" value="500.00" />
																	<input type="hidden" name="currency_code" value="USD" />
																	<input type="hidden" name="return" value=" " />
																	<input type="hidden" name="cancel_return" value=" " />
																	<input type="submit" name="submit" value="Add to cart" class="button" />
																</fieldset>
															</form>
														</div>
														-->
													</div>
												</figure>
											</div>
										</div>
									</div>
								</div>
								<?php 
									}
									//Cerrar la conexión
									include ("../configuration/close_conexion.php");
								 ?>
								<div class="clearfix"> </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- //top-brands -->

<!--brands-->
	<div class="brands">
		<div class="container">
		<h3>Marcas</h3>
			<div class="brands-agile">
				<?php 
					//Abrir la conexión
					include ("../configuration/open_conexion.php");

					$sql = "SELECT * FROM marca";
					$result = pg_query($conexion, $sql);

					while ($row = pg_fetch_array($result)) {
				 ?>
				<div class="col-md-2 w3layouts-brand">
					<div class="make brands-w3l">
						<p><a href="#"><img src="downloadImageMake.php?id_marca=<?=$row['id_marca']?>" width="100%"></a></p>
					</div>
				</div>
				<?php 
					}
					//Cerrar la conexión
					include ("../configuration/close_conexion.php");
				 ?>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>	
<!--//brands-->
<!-- new -->
	<div class="newproducts-w3agile">
		<div class="container">
			<h3>Nuevas ofertas</h3>
				<div class="agile_top_brands_grids">
					<?php 
						//Abrir la conexión
						include ("../configuration/open_conexion.php");

						//Consulta aleatoria de los prodcutos con limite de 4
						$sql = "SELECT * FROM producto ORDER BY random() LIMIT 4";
						$result = pg_query($conexion, $sql);

						while ($row = pg_fetch_array($result)) {
					 ?>
					<div class="col-md-3 top_brand_left-1">
						<div class="hover14 column">
							<div class="agile_top_brand_left_grid">
								<div class="agile_top_brand_left_grid1">
									<figure>
										<div class="snipcart-item block">
											<div class="snipcart-thumb">
												<img align='middle' src='downloadImageProduct.php?id_producto=<?=$row['id_producto']?>'>
												<p><?=$row['nombre']?></p>
												<div class="stars">
													<i class="fa fa-star blue-star" aria-hidden="true"></i>
													<i class="fa fa-star blue-star" aria-hidden="true"></i>
													<i class="fa fa-star blue-star" aria-hidden="true"></i>
													<i class="fa fa-star blue-star" aria-hidden="true"></i>
													<i class="fa fa-star gray-star" aria-hidden="true"></i>
												</div>
													<h4>$<?=$row['precio_venta']?></h4>
											</div>
											<!--
											<div class="snipcart-details top_brand_home_details">
												<form action="#" method="post">
													<fieldset>
														<input type="hidden" name="cmd" value="_cart">
														<input type="hidden" name="add" value="1">
														<input type="hidden" name="business" value=" ">
														<input type="hidden" name="item_name" value="<?=$row['nombre']?>">
														<input type="hidden" name="amount" value="<?=$row['precio_venta']?>">
														<input type="hidden" name="discount_amount" value="500.00">
														<input type="hidden" name="currency_code" value="USD">
														<input type="hidden" name="return" value=" ">
														<input type="hidden" name="cancel_return" value=" ">
														<input type="submit" name="submit" value="Add to cart" class="button">
													</fieldset>
												</form>
											</div>
											-->
										</div>
									</figure>
								</div>
							</div>
						</div>
					</div>
					<?php 
						}
						//Cerrar la conexión
						include ("../configuration/close_conexion.php");
					 ?>
					<div class="clearfix"> </div>
				</div>
		</div>
	</div>
<!-- //new -->
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
		header("location: login.php");
	}
 ?>