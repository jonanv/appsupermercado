<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php 
	session_start();
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
					<li><a href="registered.php">Registrarse</a></li>
					<li><a href="login.php">Iniciar sesión</a></li>
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
				<h1><a href="../index.php">Supermercado</a></h1>
			</div>
			<!--
			<div class="w3l_search">
				<form action="#" method="post">
					<input type="search" name="Search" placeholder="Buscar un producto..." required="">
					<button type="submit" class="btn btn-default search" aria-label="Left Align">
						<i class="fa fa-search" aria-hidden="true"> </i>
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
				<li><a href="../index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Inicio</a></li>
				<li class="active">Página de inicio de sesión</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- login -->
	<div class="login">
		<div class="container">
			<h2>Inicio de sesión</h2>
		
			<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
				<form method="post" action="">
					<input type="email" name="correo" placeholder="Correo electrónico" required >
					<input type="password" name="contrasena" placeholder="Contraseña" required >
					<select name="tipo_persona" >
						<option value="Empleado">Empleado</option>
						<option value="Cliente">Cliente</option>
					</select>
					<div class="forgot">
						<a href="#">¿Olvido su contraseña?</a>
					</div>
					<input type="submit" name="btnlogin" value="Iniciar sesión">
				</form>
			</div>
			<h4>Para personas nuevas</h4>
			<p><a href="registered.php">Registrar aquí</a> (O) volver a <a href="../index.php">Inicio<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></p>

			<?php 
				//Abrir la conexión
				include ("../configuration/open_conexion.php");

				if (isset($_POST['btnlogin'])) {
					
					$tipo_persona = $_POST['tipo_persona'];

					$correo = $_POST['correo'];
					$contrasena = $_POST['contrasena'];

					if ($tipo_persona == 'Empleado') {

						$sql = "SELECT * FROM empleado WHERE correo = '$correo' AND contrasena = '$contrasena' AND activo = 'TRUE' LIMIT 1";
						$result = pg_query($conexion, $sql) or die('La consulta fallo: ' . pg_last_error());
						$nr = pg_num_rows($result);
						
						while ($reg = pg_fetch_array($result)) {
							$_SESSION['ok'] = "ok";
							$_SESSION['cor_Usuario'] = $reg['correo'];
							$_SESSION['nom_Usuario'] = $reg['nombre']." ".$reg['apellido'];
							
							if ($reg['id_permiso'] == 1)
							{
								$_SESSION['rol_Usuario'] = "Administrador";
								$_SESSION['tipo'] = 1;
							}
							
							if ($reg['id_permiso'] == 2)
							{
								$_SESSION['rol_Usuario'] = "Empleado";
								$_SESSION['tipo'] = 2;
							}
						}

						if ($nr < 1){
							echo "<script type='text/javascript'>";
							echo "alert('Usuario no registrado...');";
							echo "</script>";
						}
						else{
							echo "<script type='text/javascript'>";
							echo "window.location.replace('menuppal.php');";
							echo "</script>";
						}
					}
					else{

						$sql = "SELECT * FROM cliente WHERE correo = '$correo' AND contrasena = '$contrasena' LIMIT 1";
						$result = pg_query($conexion, $sql) or die('La consulta fallo: ' . pg_last_error());
						$nr = pg_num_rows($result);
						
						while ($reg = pg_fetch_array($result)) {
							$_SESSION['ok'] = "ok";
							
							$_SESSION['cor_Usuario'] = $reg['correo'];
							$_SESSION['nom_Usuario'] = $reg['nombre']." ".$reg['apellido'];

							$_SESSION['rol_Usuario'] = "Cliente";
							$_SESSION['tipo'] = 3;
						}

						if ($nr < 1){
							echo "<script type='text/javascript'>";
							echo "alert('Usuario no registrado...');";
							echo "</script>";
						}
						else{
							echo "<script type='text/javascript'>";
							echo "window.location.replace('menuppal.php');";
							echo "</script>";
						}
					}
				}
				//Cerrar la conexión
				include ("../configuration/close_conexion.php");
			 ?>
		</div>
	</div>
<!-- //login -->
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