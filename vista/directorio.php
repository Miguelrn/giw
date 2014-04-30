<div style="margin-left: 20px;" id="directorio">
	<p class="fuenteSubtitulo">
		<?php 
			@session_start();					
			if (isset($_SESSION['dir'])){
				echo $_SESSION['dir'];		

// Inicio -> Pop
	
			} else {								
				$_SESSION['dir'] = "Inicio";
				echo "<a>Inicio<a>";
			}
		?>
	</p>
</div>