<div style="margin-left: 20px;">	
	<p class="fuenteSubtitulo" id="direccion">
		<a href="#inicio" onclick="window.refresh();">Inicio</a>
		<?php 
			@session_start();					
			if (isset($_GET['dir'])){
				echo " -> " . $_GET['dir'];	
			}
		?>
	</p>
</div>