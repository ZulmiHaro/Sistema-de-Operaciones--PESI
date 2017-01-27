<?php
		if (isset($con))
		{
	?>	
			<!-- Modal -->
			<div class="modal fade bs-example-modal-lg" id="asignar_personal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel"><b>Personal Disponible</b></h4>
				  </div>
				  <div class="modal-body">
					<div id="resultados_personal"></div><!-- Datos ajax Final -->
					<div id="resultados_personal1"></div><!-- Datos ajax Final -->
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-success" onclick="RegistrarPersonal();">Guardar</button>
				  </div>
				</div>
			  </div>
			</div>
	<?php
		}
	?>