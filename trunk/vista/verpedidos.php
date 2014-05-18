<!-- Ver pedidos -->
<?php		
	require_once '../controlador/opbasededatosMongoDB.php';
	ini_set("display_errores", "stdout");
	error_reporting(E_ALL | E_STRICT);
	
	if (session_id() == "") {
		@session_start();
	}
	
	if( !isset($_SESSION['logueado']) ){
		$_SESSION['logueado'] = false;
	}
	
	if(  $_SESSION['logueado'] == true ){
		$correo = $_SESSION['correo'];
		//$BDD = new Mysql();		
		//$resultadoPedidos = $BDD->conseguirPedidos($correo);
		//$_SESSION['pedidos'] = array();
		
		
		$mongo = new MongoDBConector();
		$resultadoPedidos = $mongo->conseguirPedidos($correo);
		
	}
	
?>
<div id="listaPedidos" align="center">
	<p class="fuenteTitulo" align="center">Mis pedidos</p>
	<ul>
		<?php	
			if($_SESSION['logueado'] == true){
				$numDisco = 0;
				$i=0;
				$size = count($resultadoPedidos);
				while ($i < $size && $pedido = $resultadoPedidos[i]/*mysqli_fetch_array($resultadoPedidos, MYSQLI_ASSOC)*/){
					$i++;
					//$size = count($_SESSION['pedidos']);
					//$_SESSION['pedidos'][$size] = ;
		?>
					<p class="fuenteTitulo">Pedido <?php echo $i?></p>
		<?php
					$resultadoArticulos = /*$BDD*/$mongo->conseguirArticulosDePedido($pedido['ids_articulo']);
					while ($row = mysqli_fetch_array($resultadoArticulos, MYSQLI_ASSOC)) {
						$numDisco++;
		?>		
						<li style="list-style:none;" class="fuenteSubtitulo">
							<?php echo "Disco: " . $row['nombre'] ?>
						</li>						
		<?php
					}
		?>			
					<li style="list-style:none;" class="fuenteSubtitulo">
						<?php echo "Fecha: " . $pedido['fecha'] ?>
					</li>	
					<!-- <li style="list-style:none;" class="fuenteSubtitulo">
						<?php echo "Subtotal: " . $pedido['precio'] . "€" ?>
					</li> -->
					<li style="list-style:none;" class="fuenteSubtitulo">
						<?php $total =  $pedido['precio'] ; echo "Total: " . $total . "€" ?>
					</li>	
					<li style="list-style:none;" class="fuenteSubtitulo">
						<?php echo "Estado: " . $pedido['estado'] ?>
					</li>
					<li style="list-style:none;" class="fuenteSubtitulo">
						<?php echo "Localización: " . $pedido['localizacion'] ?>
					</li>
					
		<?php	}
				//mysqli_free_result($resultadoArticulos);
			}
	
		?>
	</ul>
</div>