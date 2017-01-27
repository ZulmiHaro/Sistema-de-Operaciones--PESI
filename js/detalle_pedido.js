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
