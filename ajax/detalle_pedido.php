<?php
	
	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/* Connect To Database*/
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
	
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax')
	{
		$q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['idpedido'], ENT_QUOTES)));
		$sTable = "detalle_ambiente, ambiente";
		$sWhere = "";
		$sWhere.=" WHERE detalle_ambiente.idpedido=".$q."  and ambiente.idAmbiente=detalle_ambiente.idAmbiente";
		$sWhere.=" order by ambiente.descripcion_ambiente desc";
		$sql="SELECT descripcion_ambiente,TipoPiso,Color,Area FROM  $sTable $sWhere";
		$query = mysqli_query($con, $sql);
		echo mysqli_error($con);
		$numero = 0;
		?>
		<h5><b>Ambientes y Descripción</b></h5>
		<div class="table-responsive">
			  <table class="table">
				<tr  class="info">
					<th>#</th>					
					<th>Ambiente</th>
					<th>Tipo Piso</th>
					<th>Color</th>
					<th>Area</th>									
				</tr>
				<?php
				while ($row=mysqli_fetch_array($query))
				{
						$numero++;
						$Ambiente=$row['descripcion_ambiente'];						
						$TipoPiso=$row['TipoPiso'];						
						$Color=$row['Color'];
						$Area=$row['Area'];
						if($Color=="")
						{
							$Color ="---";
						}
				?>
			    <tr>
						<td><?php echo $numero; ?></td>
						<td><?php echo $Ambiente; ?></td>
						<td><?php echo $TipoPiso; ?></td>
						<td><?php echo $Color; ?></td>
						<td><?php echo $Area; ?>m<SUP>2</SUP></td>						
				</tr>				
				<?php
				}
				?>
				</table>
			</div>		
			<?php


			$sTable1 = "detalle_actividad, actividad,tipo_servicio";
			$sWhere1 = "";
			$sWhere1.=" WHERE detalle_actividad.id_pedido=".$q." AND actividad.id_actividad = detalle_actividad.id_actividad AND Tipo_servicio.idTipoServicio=actividad.idTipoServicio";
			$sWhere1.=" order by actividad.descripcion_actividad desc";
			$sql1="SELECT detalle_actividad.id_actividad,descripcion_actividad, descripcion_servicio FROM  $sTable1 $sWhere1";
			$query1 = mysqli_query($con, $sql1);
			echo mysqli_error($con);
			$numero = 0;
			?>
			<h5><b> Actividades </b></h5>
			<div class="table-responsive">
			  <table class="table">
				<tr  class="info">					
					<th>#</th>
					<th>Actividad</th>
					<th>Servicio</th>													
				</tr>
				<?php
				while ($rw=mysqli_fetch_array($query1))
				{
						$idActividad = $rw['id_actividad'];
						if($idActividad!=11){
						$numero++;						
						$Actividad=$rw['descripcion_actividad'];						
						$Servicio=$rw['descripcion_servicio'];
				?>
			    <tr>
			    		<td><?php echo $numero; ?></td>
						<td><?php echo $Actividad; ?></td>
						<td><?php echo $Servicio; ?></td>												
				</tr>				
				<?php
				}
				}
				?>
				</table>
			</div>		
			<?php
		}
?>