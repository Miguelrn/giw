<!-- Ver Cesta de la compra -->
<?php		
	if (session_id() == "") {
		@session_start();
	}
?>
<div id="listaCompra" align="center">
	<p class="fuenteTitulo" align="center">Mi carrito</p>
	<script>
		var borraDisco = function(num){		
			$("#listaCompra").load("./controlador/borradisco.php?num="+num);	
			$("#cestaTotal").load("./vista/cesta.php");
		};
	</script>	
		<ul>
		<?php	
			if (isset($_SESSION['discos'])){
				$productos = $_SESSION['discos'];//consultar todos los items desde BD? o cookie? desde BD			
				for ($i=0, $len=count($productos); $i<$len; $i++) {
		?>		
					<li style="list-style:none;" class="fuenteSubtitulo">
						<?php echo $productos[$i][1] ?>	
						<button name="delete" onclick="borraDisco(<?php echo $i ?>)">X</button>
					</li>	
		<?php
				}
			}
		?>
		</ul>		
</div>