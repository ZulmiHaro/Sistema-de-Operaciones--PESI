<?php

	
	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/* Connect To Database*/
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
	
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	
	if($action == 'eliminar')
	{

		$id = (isset($_REQUEST['id'])&& $_REQUEST['id'] !=NULL)?$_REQUEST['id']:'';

	$delete_2=mysqli_query($con, "DELETE FROM cotizacion WHERE idcotizacion=".$id." ");
		?>
			<script type="text/javascript">
				swal("Eliminado!", "", "success");
				load(1);
			</script>
		<?php
	}

	if($action == 'ajax')
	{
		// escaping, additionally removing everything that could be (html/javascript-) code
         $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		 $sTable = "pedido, clientes,tipo_servicio, cotizacion";
		 $sWhere = "";
		 $sWhere.=" WHERE pedido.id_cliente=clientes.id_cliente and tipo_servicio.	idTipoServicio = pedido.idTipoServicio and pedido.idpedido = cotizacion.idPedido";
		if ( $_GET['q'] != "" )
		{
			$sWhere.= " and  (clientes.nombre_cliente like '%$q%' or cotizacion.idcotizacion like '%$q%')";			
		}
		
		$sWhere.=" order by cotizacion.FechaRegistro desc";
		include 'pagination.php'; //include pagination file
		//pagination variables
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 10; //how much records you want to show
		$adjacents  = 4; //gap between pages after number of adjacents
		$offset = ($page - 1) * $per_page;
		//Count the total number of row in your table*/
		$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './cotizacion.php';
		//main query to fetch the data
		$sql="SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		//loop through fetched data
		if ($numrows>0){
			echo mysqli_error($con);
			?>
			<div class="table-responsive">
			  <table class="table">
				<tr  class="info">
					<th>#</th>
					<th>Fecha Inicio</th>
					<th>Fecha Termino</th>
					<th>Cliente</th>
					<th>Estado</th>
					<th class='text-right'>Tipo Servicio</th>
					<th class='text-right'>Acciones</th>
					
				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){
						$idcotizacion=$row['idcotizacion'];
						//$numero_factura=$row['numero_factura'];
						$fechaInicio=date("d/m/Y", strtotime($row['FechaInicio']));
						$fechaTermino=date("d/m/Y", strtotime($row['FechaTermino']));
						$nombre_cliente=$row['nombre_cliente'];
						$telefono_cliente=$row['telefono_cliente'];
						$email_cliente=$row['email_cliente'];
						//$nombre_vendedor=$row['firstname']." ".$row['lastname'];
						$estado_cotizacion=$row['Estado_Cotizacion'];
						$activar ="disabled";
						$activar_1 ="disabled";
						if ($estado_cotizacion=='Pendiente'){$text_estado="Pediente";$label_class='label-warning'; $activar=""; $activar_1="";
							}
						else if($estado_cotizacion=='Cancelado'){
							$text_estado="Cancelado";$label_class='label-danger'; $activar=""; $activar_1="";
						}
						else{
								$fecha_hoy = date('Y-m-d');
								$sql_encurso=mysqli_query($con,"select * from cotizacion 
										where ((FechaInicio <= '".$fecha_hoy."'
    										AND FechaTermino >= '".$fecha_hoy."') 
        								OR FechaInicio BETWEEN '".$fecha_hoy."' AND '".$fecha_hoy."'
        								OR FechaTermino BETWEEN '".$fecha_hoy."' AND '".$fecha_hoy."') and idcotizacion = '".$idcotizacion."'");
								$count=mysqli_num_rows($sql_encurso);
								if ($count==1)
								{
									$text_estado="En Ejecución"; $label_class='label-primary';
								}
								else 
								{
									$sql_ejecutado=mysqli_query($con,"select * from cotizacion 
										where FechaTermino <= '".$fecha_hoy."' and idcotizacion = '".$idcotizacion."'");

									$count_1=mysqli_num_rows($sql_ejecutado);
									if($count_1==1)
									{
										$text_estado="Ejecutado";$label_class='label-default';
									}
									else
									{
										$text_estado="Aprobado";$label_class='label-success';
										$activar="";
									}
								}
						 		

						}


						$Servicio=$row['descripcion_servicio'];
					?>
					<tr>
						<td><?php echo $idcotizacion; ?></td>
						<td><?php echo $fechaInicio; ?></td>
						<td><?php echo $fechaTermino; ?></td>
						<td><a href="#" data-toggle="tooltip" data-placement="top" title="<i class='glyphicon glyphicon-phone'></i><?php echo $telefono_cliente;?><br><i class='glyphicon glyphicon-envelope'></i>  <?php echo $email_cliente;?>" ><?php echo $nombre_cliente;?></a></td>
						<!--<td><?php echo $nombre_vendedor; ?></td>-->
						<td><span class="label <?php echo $label_class;?>"><?php echo $text_estado; ?></span></td>
						<td class='text-right'><?php echo $Servicio; ?></td>				
						<td class="text-right" >
						<a href="editar_cotizacion.php?idcotizacion=<?php echo $idcotizacion;?>" class='btn btn-default <?php echo $activar; ?>' title='Editar Cotizacion'><i class="glyphicon glyphicon-edit"></i></a>
						<a class='btn btn-default' title='Descargar factura' onclick="Imprimir_cotizacion('<?php echo $idcotizacion;?>');"><i class="glyphicon glyphicon-download"></i></a>
						<a class='btn btn-default <?php echo $activar_1; ?>' title='Eliminar Cotizacion' onclick="Eliminar_cotizacion('<?php echo $idcotizacion;?>');"><i class="glyphicon glyphicon-trash"></i></a>
						</td>						
					</tr>
					<?php
				}
				?>
				<tr>
					<td colspan=7><span class="pull-right"><?php
					 echo paginate($reload, $page, $total_pages, $adjacents);
					?></td>
				</tr>
			  </table>
			</div>
			<?php
		}
		else
		{
			?>
			<div class="alert alert-danger alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Error!</strong> No se encontraron resultados
			</div>
			<?php
		}

	}
?>