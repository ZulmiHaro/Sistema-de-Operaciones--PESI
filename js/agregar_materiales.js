$(document).ready(function(){
			load(1);			
			load1();
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


		function load1(){
			//var q= $("#q").val();
			var page = $("#idpedido_1").val();
			//var id = "<?php echo $_GET['idpedido']; ?>";		
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'./ajax/detalle_pedido.php?action=ajax&idpedido='+page,
				 beforeSend: function(objeto){
				 $('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
			  },
				success:function(data){
					$(".outer_div1").html(data).fadeIn('slow');
					$('#loader').html('');
					
				}
			})
		};

		function agregar_materiales(id)
		{
		
			var idmaterial = id;
			var idpedido = $("#idpedido_1").val();			
			$("#resultados").fadeIn('slow');
			if(idmaterial>0)
			{
			
				var precio_venta=document.getElementById('precio_venta_'+id).value;
				var cantidad=document.getElementById('cantidad_'+id).value;
				var depreciacion=document.getElementById('depreciacion_'+id).value;

				//alert(precio_venta);
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
	        		url: "./ajax/agregar_producto_cotizacion.php",
	        		data: "idmaterial="+id+"&idpedido="+idpedido+"&precio_venta="+precio_venta+"&cantidad="+cantidad+"&depreciacion="+depreciacion,
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
        		url: "./ajax/agregar_producto_cotizacion.php",
        		//data: "idmaterial="+id+"&idpedido="+idpedido+"&precio_venta="+precio_venta+"&cantidad="+cantidad+"&depreciacion="+depreciacion,
				data: "idmaterial="+id+"&idpedido="+idpedido,
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
				var idpedido = $("#idpedido_1").val();
				$.ajax({
	        		type: "GET",
	        		url: "./ajax/agregar_producto_cotizacion.php",
	        		data: "idmaterial="+id+"&idpedido="+idpedido+"&action="+1,
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
			var idpedido = $("#idpedido_1").val();
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
        		url: "./ajax/agregar_producto_cotizacion.php",
        		data: "idmaterial="+id+"&idpedido="+idpedido+"&cantidad="+cantidad+"&action="+2,
		 		beforeSend: function(objeto){
					$("#resultados").html('<img src="./img/ajax-loader.gif"> Cargando...');
		  		},
        		success: function(datos){
					$("#resultados").html(datos);
					swal("El valor fue actualizado!", "", "success");
				}
				});
		};

		function agregar_personal(fechaEsperada)
		{
			
			var idpedido = $("#idpedido_1").val();
			var fechaI =$("#fechaInicio").val();
			var fechaF =$("#fechaFinal").val();

			if(fechaI=="" || fechaF=="")
			{
				swal("ERROR!", "Debe Ingresar las fechas las  fechas! .", "error");
				return false;
			}

			if(fechaI>fechaF)
			{
			   swal("ERROR!", "La fecha de Inicio debe ser menor o igual a la de termino.!", "error");
			   return false;
			}

			if( fechaF > fechaEsperada)
			{
				swal("ERROR!", "La fecha de Termino no es la esperada por el cliente.!", "error");
				return false;
			}

			var fechaHoy = new Date();
			var fechah = fechaHoy.getFullYear()+'-';
			if(fechaHoy.getMonth()<10){fechah+='0';}
			fechah+= (fechaHoy.getMonth()+1)+'-'+fechaHoy.getDate();
			if(fechaI<fechah)
			{
			  swal("ERROR!", "La fecha de Inicio debe ser mayor o igual a la actual.!", "error");
			  return false;
			}
			$('#asignar_personal').modal('show');


			$.ajax({
	        		type: "POST",
	        		url: "./ajax/agregar_personal_cotizacion.php",
	        		data: "idpedido="+idpedido+"&fechaInicio="+fechaI+"&fechaTermino="+fechaF,
					//data: "idmaterial="+id+"&idpedido="+idpedido,
					beforeSend: function(objeto){
							$("#resultados_personal").html('<img src="./img/ajax-loader.gif"> Cargando...');
							//$("#guardando").disabled = true;
							//$("#resultados").html("Mensaje: Cargando...");
			  		 },
	        		success: function(datos){
					$("#resultados_personal").html(datos);
					//swal("Listo!", "", "success");
					}
				});
			

		};

		function RegistrarPersonal()
		{

			var idpedido = $("#idpedido_1").val();
			var fechaI =$("#fechaInicio").val();
			var fechaF =$("#fechaFinal").val();

			var cont = document.tablaPersonal.seleccion;
			var bool = 0;
			for(x=0; x<cont.length; x++)
			{
				if(cont[x].checked)
				{
					bool = 1;
				}
			}


			if(bool == 0)
			{
				swal("ERROR!", "Tiene que seleccionar personal para registrar.!", "error");
				return false;
			}
			else
			{
				var action = 'eliminar';
				$.ajax({
		        		type: "POST",
		        		url: "./ajax/guardar_personal.php",
		        		data: "idpedido="+idpedido+"&action="+action
						});
				action = 'grabar';
				for(x=0; x<cont.length; x++)
				{
					if(cont[x].checked)
					{
					   //alert(cont[x].value);
					   var idpersonal = cont[x].value;
					   $.ajax({
		        		type: "POST",
		        		url: "./ajax/guardar_personal.php",
		        		data: "idpersonal="+idpersonal+"&idpedido="+idpedido+"&action="+action+"&fechaInicio="+fechaI+"&fechaTermino="+fechaF,
						//data: "idmaterial="+id+"&idpedido="+idpedido,
						beforeSend: function(objeto){
								$("#resultados_personal1").html('<img src="./img/ajax-loader.gif"> Cargando...');
								//$("#resultados").html("Mensaje: Cargando...");
				  		 },
		        		success: function(datos){
							$("#resultados_personal1").html(datos);
							//swal("Listo!", "", "success");
						}
						});
						swal("Listo!", "", "success");
					}

				}
				//alert(cont.length);			
				return false;
		    }
		};

		function guardarCotizacion()
		{
			

			//alert('Guardando');
			if ( $("#seleccion").length ) 
			{

				var idpedido = $("#idpedido_1").val();
				var fechaI =$("#fechaInicio").val();
				var fechaF =$("#fechaFinal").val();
				var action = 'guardar_cotizacion';

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
			}			
			else
			{
				swal("ERROR!", "Aún no asigna personal para el servicio.!", "error");
			}
			
				return false;
		};

