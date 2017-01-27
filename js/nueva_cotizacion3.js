$(document).ready(function(){
			load(1);			
			load1();
			agregar_materiales(1);
			
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
		}

