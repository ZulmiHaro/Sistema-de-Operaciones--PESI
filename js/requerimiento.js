$(document).ready(function(){
			load(1);			
		});

		function load(page)
		{
			
			var q= $("#q").val();
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'./ajax/buscar_requerimiento.php?action=ajax&page='+page+'&q='+q,
				 beforeSend: function(objeto){
				 $('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
			  },
				success:function(data){
					$(".outer_div").html(data).fadeIn('slow');
					$('#loader').html('');
					$('[data-toggle="tooltip"]').tooltip({html:true}); 
					
				}
			});
		};

		function Eliminar_requerimiento(id)
		{
			swal({
  		  	title:"¿Está seguro?",
  		  	text: "Se borrará todo registro relacionado con este elemento!.",
  		  	type: "warning",
  		  	showCancelButton: true,
  		  	cancelButtonText: "Cancelar",
          	confirmButtonColor: "#DD6B55",
          	confirmButtonText: "Sí, Eliminar!",
          	closeOnConfirm: false,
          	showLoaderOnConfirm: true
        	},
        	function(){        	
			$.ajax({
				url:'./ajax/buscar_requerimiento.php?action=eliminar&id='+id,				
				success:function(data){
					$('#Respuesta_Eliminar').html(data);
				}
			});
        		});
		};

		function Imprimir_requerimiento(id)
		{

			
        	VentanaCentrada('./pdf/documentos/ver_Requerimiento.php?idRequerimiento='+id,'Requerimiento','','1024','768','true');
        	
		};