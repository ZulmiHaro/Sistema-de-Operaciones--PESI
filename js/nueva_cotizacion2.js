$(document).ready(function(){
			load(1);
			
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

	function load1(idpedido)
	{
	
			$.ajax({
					  url:'./ajax/detalle_pedido.php?action=ajax&idpedido='+idpedido;
			
			success:function(data){
			$("#lista").html(data);
			//$('#loader').html('');
			//$('[data-toggle="tooltip"]').tooltip({html:true}); 
							
			}
			})
	};