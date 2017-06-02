<?php 
	
	#Servidor web Heroku-PostgreSQL
	$conexion = pg_connect("host=ec2-54-221-255-153.compute-1.amazonaws.com dbname=da721o5fsp76im user=fzivxgvxuynbkb password=a0fb2a0f94539d33479a03f7ae8d1d5be441256d6bb4a7737e4314f1c55ae070");

	#Servidor local
	#$conexion = pg_connect("host=localhost dbname=supermercado user=postgres password=admin");
	if (!$conexion) {
		echo ('<p>Imposible conectarse a la base de datos' . pg_last_error() . '</p>');
		exit;
	}
	else{
		#echo ('<p>Conexión exitosa a la base de datos</p>');
	}
	

 ?>
