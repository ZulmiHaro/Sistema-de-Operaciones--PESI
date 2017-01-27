<?php

	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/* Connect To Database*/
	$session_id= session_id();

	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos

	if (isset($_POST['idcotizacion'])){$idcotizacion=$_POST['idcotizacion'];}	
	if (isset($_POST['action'])){$action=$_POST['action'];}

	if($action == 'eliminar')
	{
		$delete=mysqli_query($con, "DELETE FROM tmp_personal WHERE id_cotizacion =".$idcotizacion." and session_id='".$session_id."'");
	}
	else
	{

		
		if (isset($_POST['fechaInicio'])){$fechaInicio=$_POST['fechaInicio'];}
		if (isset($_POST['fechaTermino'])){$fechaTermino=$_POST['fechaTermino'];}

		if($action == 'grabar')
		{
			if (isset($_POST['idpersonal'])){$idpersonal=$_POST['idpersonal'];}
			
			$insert_tmp=mysqli_query($con, "INSERT INTO tmp_personal ( id_cotizacion,id_personal,FechaInicio_tmp,FechaFinal_tmp,session_id) VALUES ('$idcotizacion','$idpersonal','".$fechaInicio."','".$fechaTermino."','$session_id')");
		}

		if($action == 'guardar_cotizacion')
		{


			$sql_1=mysqli_query($con,"select count(*) as cantidad from tmp_personal where id_cotizacion=".$idcotizacion." and FechaInicio_tmp='".$fechaInicio."' and FechaFinal_tmp='".$fechaTermino."' and session_id='".$session_id."'");
			
			while ($row_1=mysqli_fetch_array($sql_1)){
						$count_1 = $row_1["cantidad"];
			}

			if($count_1==0)
			{

				?>
					<script type="text/javascript">
						swal("ERROR!", "Aún no guarda el personal asignado para el servicio.!", "error");
					</script>	
					<a class="btn btn-success" onclick="guardarCotizacion();" id="guardando" name="guardando">
					<span class="glyphicon glyphicon-floppy-disk"></span> GUARDAR</a>
				<?php
			}
			else
			{
			
			$costo_Total = 0;
			$Estado_ct = "Pendiente";
			$Fecha_Hoy = date("Y-m-d H:i:s");			

			$delete=mysqli_query($con, "DELETE FROM cotizacion_material WHERE idCotizacion =".$idcotizacion."");

			$sql_2=mysqli_query($con,"select id_material,cantidad_tmp ,depreciacion_tmp, precio_tmp from tmp_materiales  where id_cotizacion=".$idcotizacion." and session_id='".$session_id."' ");
			
			while ($row_2=mysqli_fetch_array($sql_2)){

						$idmaterial = $row_2["id_material"];
						$cantidad =  $row_2["cantidad_tmp"];
						$precio =  $row_2["precio_tmp"];
						$depreciacion =  $row_2["depreciacion_tmp"];
						$costo_Total = $costo_Total + ($cantidad*$precio*$depreciacion);

		$insert_detalle_materiales=mysqli_query($con, "INSERT INTO cotizacion_material(idMaterial, idCotizacion, Cantidad) VALUES('".$idmaterial."','".$idcotizacion."','".$cantidad."')");
			}

			$delete_1=mysqli_query($con, "DELETE FROM tmp_materiales WHERE id_cotizacion=".$idcotizacion." and session_id='".$session_id."' ");

			$delete=mysqli_query($con, "DELETE FROM cotizacion_personal WHERE idCotizacion =".$idcotizacion."");

			$sql_3=mysqli_query($con,"select id_personal from tmp_personal where 
								    id_cotizacion=".$idcotizacion." and FechaInicio_tmp='".$fechaInicio."' and FechaFinal_tmp='".$fechaTermino."' and session_id='".$session_id."' ");
			

			while ($row_3=mysqli_fetch_array($sql_3))
			{
						$idpersonal = $row_3["id_personal"];

			$insert_detalle_materiales=mysqli_query($con, "INSERT INTO cotizacion_personal (idpersonal, idCotizacion) VALUES ('".$idpersonal."','".$idcotizacion."')");
						$costo_Total = $costo_Total + 28.3;
			}

			$delete_2=mysqli_query($con, "DELETE FROM tmp_personal WHERE id_cotizacion=".$idcotizacion." and session_id='".$session_id."' ");


			$actualizar = mysqli_query($con, "UPDATE cotizacion set CostoTotal = $costo_Total,FechaRegistro='".$Fecha_Hoy."' , FechaInicio='".$fechaInicio."' , FechaTermino ='".$fechaTermino."',Estado_Cotizacion ='$Estado_ct' WHERE idcotizacion ='".$idcotizacion."'");

			?>
					<script type="text/javascript">
						swal("Listo!", "Se guardaron los datos!.", "success");
						window.location="cotizacion.php";
					</script>
			<?php
		
		}
		}
 	}
?>

	