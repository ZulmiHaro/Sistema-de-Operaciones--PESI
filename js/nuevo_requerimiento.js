$(document).ready(function(){
			load(1);
			agregar_materiales(0);			
		});


		function load(page){
			var q= $("#q").val();
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'./ajax/Materiales_cotizacion.php?action=ajax&page='+page+'&q='+q,
				 beforeSend: function(objeto){
				 $('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
			  },
				success:function(data){
					$(".outer_div").html(data).fadeIn('slow');
					$('#loader').html('');
					
				}
			})
		};

		function agregar_materiales(id)
		{
		
			var idmaterial = id;			
			$("#resultados").fadeIn('slow');
			if(idmaterial>0)
			{
			
				var precio_venta=document.getElementById('precio_venta_'+id).value;
				var cantidad=document.getElementById('cantidad_'+id).value;
				var depreciacion=document.getElementById('depreciacion_'+id).value;

				//alert(idmaterial+precio_venta+cantidad+depreciacion);
				//Inicia validacion
				if (isNaN(cantidad))
				{
					swal("ERROR!", "No es un número! .", "error");
					document.getElementById('cantidad_'+id).focus();
					return false;
				}
			
			//Fin validacion
			
				$.ajax({
	        		type: "POST",
	        		url: "./ajax/agregar_producto_requerimiento.php",
	        		data: "idmaterial="+id+"&precio_venta="+precio_venta+"&cantidad="+cantidad+"&depreciacion="+depreciacion,
					//data: "idmaterial="+id+"&idpedido="+idpedido,
					beforeSend: function(objeto){
							$("#resultados").html('<img src="./img/ajax-loader.gif"> Cargando...');
							//$("#resultados").html("Mensaje: Cargando...");
			  		 },
	        		success: function(datos){
					$("#resultados").html(datos);
					//swal("Listo!", "", "success");
					}
				});
			}
			else
			{
				$.ajax({
        		type: "POST",
        		url: "./ajax/agregar_producto_requerimiento.php",
        		//data: "idmaterial="+id+"&idpedido="+idpedido+"&precio_venta="+precio_venta+"&cantidad="+cantidad+"&depreciacion="+depreciacion,
				data: "idmaterial="+id,
				beforeSend: function(objeto){
						$("#resultados").html('<img src="./img/ajax-loader.gif"> Cargando...');
		  		 },
        		success: function(datos){
				$("#resultados").html(datos);
				}
				});
			}
		};

		function eliminar (id)
		{

			swal({
  		  	title:"¿Está seguro?",
  		  	//text: "Usted no será capaz de recuperar ningun dato de la matriz!",
  		  	type: "warning",
  		  	showCancelButton: true,
  		  	cancelButtonText: "Cancelar",
          	confirmButtonColor: "#DD6B55",
          	confirmButtonText: "Sí, eliminarlo!",
          	closeOnConfirm: false,
          	showLoaderOnConfirm: true
        	},
        	function(){
				
				$.ajax({
	        		type: "GET",
	        		url: "./ajax/agregar_producto_requerimiento.php",
	        		data: "idmaterial="+id+"&action="+1,
			 		beforeSend: function(objeto){
						$("#resultados").html('<img src="./img/ajax-loader.gif"> Cargando...');
			  		},
	        		success: function(datos){
						$("#resultados").html(datos);
						swal("Eliminado!", "", "success");
					}
					});
			});
		};

		function mostrarDatos(id, cantidad)
		{
			$("#idmaterial_mod").val(id);	
			$("#cantidad_mod").val(cantidad);
		};

		function editar()
		{
			
			var id = $("#idmaterial_mod").val();
			var cantidad=$("#cantidad_mod").val();
			if (isNaN(cantidad))
			{
				swal("ERROR!", "No es un número! .", "error");
				//document.getElementById('cantidad_'+id).focus();
				return false;
			}

			$.ajax({
        		type: "GET",
        		url: "./ajax/agregar_producto_requerimiento.php",
        		data: "idmaterial="+id+"&cantidad="+cantidad+"&action="+2,
		 		beforeSend: function(objeto){
					$("#resultados").html('<img src="./img/ajax-loader.gif"> Cargando...');
		  		},
        		success: function(datos){
					$("#resultados").html(datos);
					swal("El valor fue actualizado!", "", "success");
				}
				});
		};

		
		function guardarRequerimiento()
		{
				$.ajax({
		        		type: "POST",
		        		url: "./ajax/guardar_personal.php",
		        		data: "idpedido="+idpedido+"&action="+action+"&fechaInicio="+fechaI+"&fechaTermino="+fechaF,
						
						beforeSend: function(objeto){
								$("#respuesta_guardar").html('<img src="./img/ajax-loader.gif"> Cargando...');
								//$("#resultados").html("Mensaje: Cargando...");
				  		 },
		        		success: function(datos){
							$("#respuesta_guardar").html(datos);						
						}
					});
			
				return false;
		};

