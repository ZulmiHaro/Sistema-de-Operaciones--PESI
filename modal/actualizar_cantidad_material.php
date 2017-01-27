	<?php
		if (isset($con))
		{
	?>	

	<style>
    #mdialTamanio{
      	top: 25%;
     	left: 0%;
      	width: 15% !important;
    }
  </style>
	<div class="modal fade" id="ModalCantidad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                           <!--ASIGNAMOS UN ID A ESTE DIV -->
      <div class="modal-dialog" id="mdialTamanio">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Ingrese Cantidad</h4>
          </div>
          <div class="modal-body">
	          <form class="form-horizontal">
				<div class="form-group">
					<input type="hidden" id="idmaterial_mod" >
						<label class="control-label col-xs-5"> Cantidad</label>
					<div class="col-xs-5">
					<input type="text" class="form-control" id="cantidad_mod" placeholder="Cantidad">
					</div>						
			    </div>
			  </form>	
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-success" onclick="editar();" data-dismiss="modal">Guardar</button>
          </div>
        </div>
      </div>
    </div>
	<?php
		}
	?>