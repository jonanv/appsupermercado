<?php 
	
	#Servidor web Heroku-PostgreSQL
	$conexion = pg_connect("host=ec2-23-23-227-188.compute-1.amazonaws.com dbname=deug4arntm9gvj user=qryfoiywbmxfit password=1c9fd69fa358afe5d9bcc1d23268297b567fbcaea59945804c1e6a0afcc5e86b");

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
