<?php 
	function dist_euclidiana($v1, $v2){
		$dimension = count($v1);
		$suma = 0;
		for ($i=0; $i < $dimension; $i++) { 
			$suma += pow($v1[$i] - $v2[$i], 2);
		}
		return sqrt($suma);
	}

	function eliminar_signosPunt($cadena){
		return ereg_replace("[^A-Za-z0-9Á-Úá-ú ]", "", $cadena);
	}

	function eliminar_preposiciones($lista, $preposiciones){
		$lista_nueva = array();
		for ($i=0; $i < count($lista); $i++) { 
			if (!in_array($lista[$i], $preposiciones)) {
				array_push($lista_nueva, $lista[$i]);
			}
		}
		return $lista_nueva;
	}

	function lista_completa($lista_max, $lista_min){
		#Lista completa de la union de las dos listas
		$lista_total = array();
		for ($i=0; $i < count($lista_max); $i++) { 
			array_push($lista_total, $lista_max[$i]);
		}
		for ($i=0; $i < count($lista_min); $i++) { 
			array_push($lista_total, $lista_min[$i]);
		}
		#print_r($lista_total);

		#Lista completa de la union de las dos listas sin elementos repetidos
		$lista_nueva = array();
		for ($i=0; $i < count($lista_total); $i++) { 
			if (!in_array($lista_total[$i], $lista_nueva)) {
				array_push($lista_nueva, $lista_total[$i]);
			}
		}
		#print_r($lista_nueva);
		return $lista_nueva;
	}

	function recomendar($cadena1, $cadena2){
		$preposiciones = array('en', 'se', 'la', 'de', 'del', 'y', 'e', 'ni', 'o', 'u', 'ya', 'bien', 'mas', 'más', 
		'pero', 'sino', 'luego', 'pues', 'a', 'ante', 'bajo', 'con', 'contra', 'desde', 'entre', 'hacia', 'hasta', 
		'para', 'por', 'según', 'sin', 'sobre', 'tras', 'pre', 'pro', 'las', 'los', 'mediante', 'durante', 'versus', 
		'vía', 'so', 'favor', 'cerca', 'lo', 'largo', 'alrededor', 'conforme', 'debajo', 'delante', 'detrás', 
		'después', 'lugar', 'medio', 'vez', 'encima', 'excepto', 'fuera', 'si', 'sí', 'no', 'mi', 'mí', 'su', 'cuál', 
		'cuáles', 'cómo', 'como', 'qué', 'que', 'cuán', 'cuánto', 'cuántos', 'cuántas', 'cuándo', 'adónde', 'dónde', 
		'donde', 'quién', 'quien', 'quiénes', 'porqué', 'yo', 'conmigo', 'tú', 'vos', 'usted', 'ti', 'contigo', 'el',
		'él', 'ella', 'ello', 'consigo', 'nosotros', 'nosotras', 'ustedes', 'vosotros', 'vosotras', 'ellos', 
		'ellas', 'me', 'nos', 'te', 'le', 'les', 'mío', 'mía', 'míos', 'mías', 'tuyo', 'tuya', 'tuyos', 'tuyas', 
		'suyo', 'suya', 'suyos', 'suyas', 'nuestro', 'nuestra', 'nuestros', 'nuestras', 'vuestro', 'vuestra', 
		'vuestros', 'vuestras', 'este', 'esta', 'esto', 'estos', 'estas', 'ese', 'esa', 'eso', 'esos', 'esas', 
		'aquel', 'aquella', 'aquello', 'aquellos', 'aquellas', 'cuyo', 'uno', 'una', 'tercero', 'doble', 'mitad', 'un', 
		'mismo', 'misma', 'son', 'es');

		#echo count($preposiciones) . "\n";

		$lista1 = preg_split("/\s/", mb_strtolower(eliminar_signosPunt($cadena1), "UTF-8"));
		$lista_nueva1 = eliminar_preposiciones($lista1, $preposiciones);
		#print_r($lista_nueva1);

		$lista2 = preg_split("/\s/", mb_strtolower(eliminar_signosPunt($cadena2), "UTF-8"));
		$lista_nueva2 = eliminar_preposiciones($lista2, $preposiciones);
		#print_r($lista_nueva2);

		if (count($lista_nueva1) > count($lista_nueva2) or count($lista_nueva1) == count($lista_nueva2)) {
			$lista_max = $lista_nueva1;
			$lista_min = $lista_nueva2;
		}
		else{
			$lista_max = $lista_nueva2;
			$lista_min = $lista_nueva1;
		}
		#print_r($lista_max);
		#print_r($lista_min);

		$lista_nueva = lista_completa($lista_max, $lista_min);

		#Conformación de la lista en números
		$lista1 = array();
		for ($i=0; $i < count($lista_nueva); $i++) { 
			if (in_array($lista_nueva[$i], $lista_max)) {
				array_push($lista1, 1);
			}
			else{
				array_push($lista1, 0);
			}
		}
		#print_r($lista1);

		$lista2 = array();
		for ($i=0; $i < count($lista_nueva); $i++) { 
			if (in_array($lista_nueva[$i], $lista_min)) {
				array_push($lista2, 1);
			}
			else{
				array_push($lista2, 0);
			}
		}
		#print_r($lista2);

		$resultado = dist_euclidiana($lista1, $lista2);
		return $resultado;
	}

	/*
	$cadena1 = "En esta animación se presenta la descripción ejemplificada de la operación de Algebra relacional: Asignación";
	$cadena2 = "En este vídeo se presenta la descripción ejemplificada del componente de Algebra relacional: Vistas";
	print_r(recomendar($cadena1, $cadena2));
	*/

	
	//Abrir la conexión
	include ("../configuration/open_conexion.php");

	$correo = $_SESSION['cor_Usuario'];
	$sql = "SELECT * FROM detalle_venta d INNER JOIN factura_venta f ON d.id_factura_venta = f.id_factura_venta INNER JOIN producto p ON d.id_producto = p.id_producto INNER JOIN cliente c ON f.cedula = c.cedula WHERE c.correo = '$correo' ORDER BY d.id_producto ASC";
	$result = pg_query($conexion, $sql);

	$sql1 = "SELECT * FROM producto ORDER BY id_producto ASC";
	$result1 = pg_query($conexion, $sql1);

	/*print_r(pg_num_rows($result));
	print_r("<br/>");
	print_r(pg_num_rows($result1));
	print_r("<br/>");*/

	#Conformación del arreglo de productos del cliente
	$array_prodcl = array();
	$i = 0;
	while ($row = pg_fetch_array($result)) {
		$array_prodcl[$i] = $row['descripcion'];
		$i++;
	}
	/*print_r($array_prodcl);
	print_r("<br/>");
	print_r("<br/>");*/

	#Elimina elementos repetidos del vector de productos del cliente
	$nvo_array_prodcl = array();
	for ($i=0; $i < count($array_prodcl); $i++) { 
		if (!in_array($array_prodcl[$i], $nvo_array_prodcl)) {
			array_push($nvo_array_prodcl, $array_prodcl[$i]);
		}
	}
	/*print_r($nvo_array_prodcl);
	print_r("<br/>");
	print_r("<br/>");*/
	
	#Conformación del arreglo de productos de la base de datos, inicia desde 1
	$array_prod = array();
	while ($row1 = pg_fetch_array($result1)) {
		$array_prod[$row1['id_producto']] = $row1['descripcion'];
	}
	/*print_r($array_prod);
	print_r("<br/>");
	print_r("<br/>");*/
	
	$lista_nprod[][] = array();
	$prod_recomendados[] = array();
	$k = 0;
	for ($i=0; $i < count($nvo_array_prodcl); $i++) { 
		for ($j=1; $j <= count($array_prod); $j++) { 
			$lista_nprod[$i][$j] = recomendar($nvo_array_prodcl[$i], $array_prod[$j]);

			#Productos inferiores a 2.5 para ser recomendados
			if ($lista_nprod[$i][$j] <= 2.5) {
				$prod_recomendados[$k] = $j;
				$k++;
			}
		}
	}
	/*print_r($lista_nprod);
	print_r("<br/>");
	print_r("<br/>");
	
	print_r($prod_recomendados);
	print_r("<br/>");
	print_r("<br/>");

	print_r(count($prod_recomendados));
	print_r("<br/>");
	print_r("<br/>");*/
	

	for ($i=0; $i < count($prod_recomendados); $i++) { 

		//Consulta aleatoria de los prodcutos con limite de 6
		$sql2 = "SELECT * FROM producto WHERE id_producto = $prod_recomendados[$i] ORDER BY id_producto";
		$result2 = pg_query($conexion, $sql2);
		$row2 = pg_fetch_array($result2);
 ?>
		<div class="col-md-4 top_brand_left">
			<div class="product hover14 column">
				<div class="agile_top_brand_left_grid">
					<div class="agile_top_brand_left_grid1">
						<figure>
							<div class="snipcart-item block" >
								<div class="snipcart-thumb">
									<img align='middle' src='downloadImageProduct.php?id_producto=<?=$row2['id_producto']?>'>
									<p><?=$row2['nombre']?></p>
									<div class="stars">
										<i class="fa fa-star blue-star" aria-hidden="true"></i>
										<i class="fa fa-star blue-star" aria-hidden="true"></i>
										<i class="fa fa-star blue-star" aria-hidden="true"></i>
										<i class="fa fa-star blue-star" aria-hidden="true"></i>
										<i class="fa fa-star gray-star" aria-hidden="true"></i>
									</div>
									<h4>$<?=$row2['precio_venta']?></h4>
								</div>
								<!--
								<div class="snipcart-details top_brand_home_details">
									<form action="#" method="post">
										<fieldset>
											<input type="hidden" name="cmd" value="_cart" />
											<input type="hidden" name="add" value="1" />
											<input type="hidden" name="business" value=" " />
											<input type="hidden" name="item_name" value="<?=$row2['nombre']?>" />
											<input type="hidden" name="amount" value="<?=$row2['precio_venta']?>" />
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