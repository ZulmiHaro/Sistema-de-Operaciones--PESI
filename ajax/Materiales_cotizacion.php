<?php

	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/* Connect To Database*/
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
	
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
		// escaping, additionally removing everything that could be (html/javascript-) code
         $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		 //$aColumns = array('idMaterial', 'descripcion');//Columnas de busqueda
		 $sTable = "material_equipo, tipo_material";
		 $sWhere = " WHERE tipo_material.idTipoMaterial = material_equipo.idTipoMaterial";
		 if ( $_GET['q'] != "" )
		 {
			$sWhere.= " and  (idMaterial like '%".$q."%' or descripcion like '%".$q."%')";		
		 }
		include 'pagination.php'; //include pagination file
		//pagination variables
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 7; //how much records you want to show
		$adjacents  = 1; //gap between pages after number of adjacents
		$offset = ($page - 1) * $per_page;
		//Count the total number of row in your table*/	
		$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './index.php';
		//main query to fetch the data}
		$sql="SELECT idmaterial, descripcion, unidadMedida, depreciacion, precio,descripcion_tipo_material FROM  $sTable $sWhere order by idMaterial asc LIMIT $offset,$per_page ";
		$query = mysqli_query($con, $sql);
		//loop through fetched data
		if ($numrows>0){
			
			?>
			<div class="table-responsive">
			  <table class="table">
				<tr  class="warning">
					<th>Código</th>
					<th>Material/Equipo</th>
					<th>Tipo</th>
					<th>U.M.</th>
					<th>Depreciación</th>
					<th>Precio</th>
					<th>Cantidad</th>
					<th class='text-center' style="width: 36px;">Agregar</th>
				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){
						$idmaterial=$row['idmaterial'];						
						$nombre_material=$row['descripcion'];
						$tipo_material=$row['descripcion_tipo_material'];
						$unidMedida=$row['unidadMedida'];
						$depreciacion=$row['depreciacion'];
						$precio_material=$row['precio'];
						$precio_material=number_format($precio_material,2);
					?>
					<tr>
						<td><?php echo $idmaterial; ?></td>
						<td ><?php echo $nombre_material; ?></td>
						<td ><?php echo $tipo_material; ?></td>
						<td><?php echo $unidMedida;?></td>
						<td class='text-center'><input type="hidden" id="depreciacion_<?php echo $idmaterial; ?>" value="<?php echo $depreciacion; ?>" ><?php echo $depreciacion;?></td>
						<td><input type="hidden" id="precio_venta_<?php echo $idmaterial; ?>" value="<?php echo $precio_material; ?>"  ><?php echo $precio_material;?></td>
						<td class='col-xs-1'>
						<div class="pull-right">
						<input type="text" class="form-control" style="text-align:right" id="cantidad_<?php echo $idmaterial; ?>"  value="1">						
						</td>
						<td class='text-center'><a class='btn btn-info' onclick="agregar_materiales('<?php echo $idmaterial; ?>')"><i class="glyphicon glyphicon-plus"></i></a>
						</td>
						</div>
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