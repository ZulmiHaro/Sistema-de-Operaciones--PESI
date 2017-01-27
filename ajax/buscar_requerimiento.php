<?php

	
	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/* Connect To Database*/
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
	
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	
	if($action == 'eliminar')
	{

		$id = (isset($_REQUEST['id'])&& $_REQUEST['id'] !=NULL)?$_REQUEST['id']:'';

	$delete_2=mysqli_query($con, "DELETE FROM requerimiento WHERE idRequerimiento=".$id." ");
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
		 $sTable = "requerimiento";
		 $sWhere = "";		 
		if ( $_GET['q'] != "" )
		{
			$sWhere.= "Where idRequerimiento like '%$q%'";			
		}
		
		$sWhere.=" order by requerimiento.Fecha_Registro desc";
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
		$reload = './requerimiento.php';
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
					<th>Estado</th>					
					<th class='text-right'>Acciones</th>					
				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){
						$idRequerimiento=$row['idRequerimiento'];
						//$numero_factura=$row['numero_factura'];
						$fecha_Registro=date("d/m/Y", strtotime($row['Fecha_Registro']));
						$estado_Requerimiento=$row['Estado_Requerimiento'];
						$activar ="disabled";
						$activar_1 ="disabled";
						if ($estado_Requerimiento=='Pendiente'){$text_estado="Pediente";$label_class='label-warning'; $activar=""; $activar_1="";
							}
						else if($estado_Requerimiento=='Cancelado'){
							$text_estado="Cancelado";$label_class='label-danger'; $activar=""; $activar_1="";
						}
						else{								
							   $text_estado="Aprobado";$label_class='label-success';
							   $activar="";
						}
					?>
					<tr>
						<td><?php echo $idRequerimiento; ?></td>
						<td><?php echo $fecha_Registro; ?></td>	
						<td><span class="label <?php echo $label_class;?>"><?php echo $text_estado; ?></span></td>									
						<td class="text-right" >
						<a href="editar_requerimiento.php?idRequerimiento=<?php echo $idRequerimiento;?>" class='btn btn-default <?php echo $activar; ?>' title='Editar Requerimiento'><i class="glyphicon glyphicon-edit"></i></a>
						<a class='btn btn-default' title='Descargar Requerimiento' onclick="Imprimir_requerimiento('<?php echo $idRequerimiento;?>');"><i class="glyphicon glyphicon-download"></i></a>
						<a class='btn btn-default <?php echo $activar_1; ?>' title='Eliminar Requerimiento' onclick="Eliminar_requerimiento('<?php echo $idRequerimiento;?>');"><i class="glyphicon glyphicon-trash"></i></a>
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