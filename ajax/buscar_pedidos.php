<?php

	
	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/* Connect To Database*/
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
	
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if (isset($_GET['id'])){
		$numero_factura=intval($_GET['id']);
		$del1="delete from facturas where numero_factura='".$numero_factura."'";
		$del2="delete from detalle_factura where numero_factura='".$numero_factura."'";
		if ($delete1=mysqli_query($con,$del1) and $delete2=mysqli_query($con,$del2)){
			?>
			<div class="alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Aviso!</strong> Datos eliminados exitosamente
			</div>
			<?php 
		}else {
			?>
			<div class="alert alert-danger alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Error!</strong> No se puedo eliminar los datos
			</div>
			<?php
			
		}
	}
	if($action == 'ajax'){
		// escaping, additionally removing everything that could be (html/javascript-) code
         $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		 $sTable = "pedido, clientes,tipo_servicio";
		 $sWhere = "";
		 $sWhere.=" WHERE pedido.id_cliente=clientes.id_cliente and tipo_servicio.	idTipoServicio = pedido.idTipoServicio";
		if ( $_GET['q'] != "" )
		{
			$sWhere.= " and  (clientes.nombre_cliente like '%$q%' or pedido.idpedido like '%$q%')";			
		}
		
		$sWhere.=" order by pedido.FechaRegistro desc";
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
		$reload = './pedidos.php';
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
					<th>Fecha Registro</th>
					<th>Fecha Servicio</th>
					<th>Cliente</th>
					<th>Estado</th>
					<th class='text-right'>TIPO SERVICIO</th>
					<th class='text-right'>Registrar</th>
					
				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){
						$idpedido=$row['idpedido'];
						//$numero_factura=$row['numero_factura'];
						$fechaRegistro=date("d/m/Y", strtotime($row['FechaRegistro']));
						$fechaInicio=date("d/m/Y", strtotime($row['FechaInicio']));
						$nombre_cliente=$row['nombre_cliente'];
						$telefono_cliente=$row['telefono_cliente'];
						$email_cliente=$row['email_cliente'];
						//$nombre_vendedor=$row['firstname']." ".$row['lastname'];
						$estado_pedido=$row['Estado_pedido'];
						$activar ="disabled";
						if ($estado_pedido=='Enviado'){$text_estado="Pediente";$label_class='label-warning'; $activar="";
							}
						else if($estado_pedido=='Cancelado'){
							$text_estado="Cancelado";$label_class='label-danger';
						}
						else{$text_estado="Asignado";$label_class='label-success';}
						$Servicio=$row['descripcion_servicio'];
					?>
					<tr>
						<td><?php echo $idpedido; ?></td>
						<td><?php echo $fechaRegistro; ?></td>
						<td><?php echo $fechaInicio; ?></td>
						<td><a href="#" data-toggle="tooltip" data-placement="top" title="<i class='glyphicon glyphicon-phone'></i> <?php echo $telefono_cliente;?><br><i class='glyphicon glyphicon-envelope'></i>  <?php echo $email_cliente;?>" ><?php echo $nombre_cliente;?></a></td>
						<!--<td><?php echo $nombre_vendedor; ?></td>-->
						<td><span class="label <?php echo $label_class;?>"><?php echo $text_estado; ?></span></td>
						<td class='text-right'><?php echo $Servicio; ?></td>				
						<td class="text-right" >
						<a href="nueva_cotizacion.php?idpedido=<?php echo $idpedido;?>" class='btn btn-default <?php echo $activar; ?>' title='Registrar Cotizacion'><i class="glyphicon glyphicon-file"></i></a>
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