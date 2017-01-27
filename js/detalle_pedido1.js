function load1(page){			
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
