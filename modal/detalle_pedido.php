<?php
		if (isset($con))
		{
	?>	
			<!-- Modal -->
			<div class="modal fade bs-example-modal-lg" id="detalle_pedido" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel"><b>Detalle del Pedido Número:  <?php echo $idpedido; ?></b></h4>									
				  </div>
				  <div class="modal-body">
					<form class="form-horizontal">
					  <div class="form-group">
					 	 <label for="servicio" class="col-md-1 control-label">Servicio</label>
						 <div class="col-md-3">
						<input type="text" class="form-control input-sm" id="servicio" value="<?php echo $Servicio; ?>" readonly>
						</div>
					  	<label for="area_total" class="col-md-2 control-label">Area (m<SUP>2</SUP>)</label>
						 <div class="col-md-1">
						<input type="text" class="form-control input-sm" id="area_total" value="<?php echo $AreaTotal; ?> " readonly>
						</div>										  		
						<label for="estado_ambientes" class="col-md-3 control-label">Estado</label>
						<div class="col-md-2">
						<input type="text" class="form-control input-sm" id="Estado_ambientes" value="<?php echo $Estado_ambientes; ?>" readonly>
						</div> 						
					  </div>
					</form>										
					<div class="outer_div1"></div><!-- Datos ajax Final -->							
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				  </div>
				</div>
			  </div>
			</div>
	<?php
		}
	?>