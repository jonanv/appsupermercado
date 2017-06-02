			<?php 
				//Abrir la conexión
				include ("../configuration/open_conexion.php");

				if (isset($_POST['btnsearch2'])) {
					$id_categoria = $_POST['id_categoria'];

					$sql = "SELECT p.*, c.id_categoria FROM producto p INNER JOIN categoria c ON p.id_categoria =  c.id_categoria AND c.id_categoria = $id_categoria";
					$result = pg_query($conexion, $sql);

					if (pg_num_rows($result) <= 0) {
			?>
						<center>
							<h3>Sin resultados</h3>
						</center>
			<?php
					}
					else
					{
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
								</div>
							</figure>
						</div>
					</div>
				</div>
			</div>
			<?php
						}
					}
				}
				//Cerrar la conexión
				include ("../configuration/close_conexion.php");
			 ?>