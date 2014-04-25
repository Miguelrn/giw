<canvas id="estadisticasCanvas" width="600" height="300"></canvas>
<script>	
	Date.prototype.yyyymmdd = function() {
	   var yyyy = this.getFullYear().toString();
	   var mm = (this.getMonth()+1).toString(); // getMonth() is zero-based
	   var dd  = this.getDate().toString();
	   return yyyy + '-' + (mm[1]?mm:"0"+mm[0]) + '-' + (dd[1]?dd:"0"+dd[0]); // padding
	 };
	var actualizaCanvas = function(tipo, data){
		var canvas = document.getElementById('estadisticasCanvas');
		var ctx = canvas.getContext && canvas.getContext('2d');
		if(!ctx) { 
	    	return alert("Por favor, actualiza tu navegador para ver el contenido correctamente.");
	    }
	    ctx.clearRect(0, 0, canvas.width, canvas.height);		
	    
	    var datos = data.split('.');
	    //console.log("dato[0]:"+datos[0]);
		
		if (tipo == 'dia'){
			
			var numpedidos = 0;
			var maxValue = 1;
			var splitDatos = datos[0].split(':');
			var nuevosDatosFechas = []; 
			var nuevosDatosIngresos = [];
			var value = parseInt(splitDatos[1]);
			if (value > maxValue){ maxValue = value }
			nuevosDatosFechas.push(splitDatos[0]);
			nuevosDatosIngresos.push(value);
			
			var pointer = 0;
			for (var i = 1, len = datos.length; i < len; ++i){
				splitDatos = datos[i].split(':');
				if (nuevosDatosFechas[pointer].localeCompare(splitDatos[0]) == 0){
					// si estoy en la misma fecha sumo
					value = parseInt(splitDatos[1]);
					if (value > maxValue){ maxValue = value }
				    var ingreso = parseInt(nuevosDatosIngresos[pointer])+value;	
				    nuevosDatosIngresos[pointer] = ingreso;
					numpedidos++;
				} else {
					// si estoy en otra fecha agrego
					value = parseInt(splitDatos[1]);
					if (value > maxValue){ maxValue = value }
					nuevosDatosFechas.push(splitDatos[0]);
					nuevosDatosIngresos.push(value);
					pointer++;
					numpedidos++;
				}				
			}	
			
			//console.log('maxValue:'+maxValue);	
			
			var ingtotales = 0;
			for (var i = 0, len = nuevosDatosIngresos.length-1; i < len; i++){
				ingtotales = parseInt(ingtotales) + parseInt(nuevosDatosIngresos[i]);
			}	
			
			var w = canvas.width/(nuevosDatosFechas.length);
			
			var initX = w/2;
			var y = 130;			
			for (var i = 0, len=nuevosDatosFechas.length-1; i < len; ++i){
				
				var x = initX + i*w;
				var precio = nuevosDatosIngresos[i];
				var h = (parseFloat(precio)/parseFloat(maxValue))*30;
				var fecha = nuevosDatosFechas[i];
				
				ctx.fillStyle = "rgb(0,0,255)";
				ctx.fillRect(x, y-h, w, h);					
				ctx.fillStyle = "rgb(0,0,0)";
				ctx.font = "bold 12px sans-serif";	
				ctx.fillText(fecha, x, y+20);
				ctx.fillText(' '+precio + "€", x, y+40);
			}
			
			ctx.fillStyle = "rgb(0,0,0)";
			ctx.font = "bold 14px sans-serif";			
			ctx.fillText("Número de pedidos: " + numpedidos, 100, 220);		
			ctx.fillText("Ingresos totales: " + ingtotales + "€", 100, 250);
		  				  			
		} else if (tipo == 'mes'){
			
			
			
		} else if (tipo == 'anno'){
			
			
		}
		
	};	
</script>
<p align="center" class="fuenteTitulo">Filtro de pedidos e ingresos</p>
<p align="center" class="fuenteSubtitulo">Fecha de inicio: <input id="inputInicio" type="date" pattern="" name="fechaInicio"/></p>
<p align="center" class="fuenteSubtitulo">Fecha de limite: <input id="inputFin" type="date" name="fechaFin"/></p>

<div align="center">
		<script>
		var filtrarLosPedidos = function(){
			// OJO: yyyy-mm-dd
			console.log('filtrarPedidos');
			
			var init = document.getElementById('inputInicio').value;
			var date1, date2;
			if (init == ""){
				date1 = new Date();
				init = date1.yyyymmdd();
			} else {	
				init = init.split("-");		
				date1 = new Date(init[0],init[1]-1,init[2]);
				init = date1.yyyymmdd();
			}
			
			var fin = document.getElementById('inputFin').value;		
			if (fin == ""){
				date2 = new Date();
				fin = date2.yyyymmdd();
			} else {
				fin = fin.split("-");
				date2 = new Date(fin[0],fin[1]-1,fin[2]);
				fin = date2.yyyymmdd();
			}
			//console.log(init + ' - ' + fin);
			
			var timeDiff = Math.abs(date2.getTime() - date1.getTime());
			var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); 		
			/*if (diffDays <= 7){
				var tipo = 'dia';			
			} else if (diffDays <= 360){
				var tipo = 'mes';					
			} else {
				var tipo = 'anno';						
			}*/
			var tipo = 'dia';
			
			$.ajax({
			    url: "./controlador/estadisticas/filtropedidos.php",
			    type: "GET",
			    async: true, 
			    data: { 'inicio' : init, 'final' : fin, 'tipo' : tipo },
			    dataType: "html",		
			    success: function(data) {
			    	actualizaCanvas(tipo, data);		           
			    }  
			});		
		};
	</script>
	<button align="center" onclick="filtrarLosPedidos()">Filtrar</button>
</div>
<script type="text/javascript">
filtrarLosPedidos();
</script>


