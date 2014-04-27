<div style="margin-left: 20px;" id="directorio">
	<p class="fuenteSubtitulo">
		<?php 
			@session_start();					
			if (isset($_SESSION['dir'])){
				echo $_SESSION['dir'];				
			} else {								
				$_SESSION['dir'] = "Inicio";
				echo "Inicio";
			}
		?>
	</p>
</div>