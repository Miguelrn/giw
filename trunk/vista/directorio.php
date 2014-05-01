<div style="margin-left: 20px;">	
	<p class="fuenteSubtitulo" id="direccion">
		<?php				
			if (isset($_GET['dirabs'])){
				echo $_GET['dirabs'];					
			} else {	
		?>
		
		<a href="#inicio" onclick="window.location.reload()">Inicio</a>
		<?php 			
				if (isset($_GET['dir'])){
					echo " -> " . $_GET['dir'];	
				}
			}
		?>
		
	</p>
</div>