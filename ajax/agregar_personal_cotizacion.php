<?php

	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/* Connect To Database*/
	$session_id= session_id();

	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos

	if (isset($_POST['idpedido'])){$idpedido=$_POST['idpedido'];}
	if (isset($_POST['fechaInicio'])){$fechaInicio=$_POST['fechaInicio'];}
	if (isset($_POST['fechaTermino'])){$fechaTermino=$_POST['fechaTermino'];}

	$sql=mysqli_query($con,"select DISTINCT idpersonal  from cotizacion inner join cotizacion_personal on cotizacion_personal.idcotizacion = cotizacion.idcotizacion 
		WHERE ((FechaInicio <= '".$fechaInicio."'
    	AND FechaTermino >= '".$fechaTermino."') 
        OR FechaInicio BETWEEN '".$fechaInicio."' AND '".$fechaTermino."'
        OR FechaTermino BETWEEN '".$fechaInicio."' AND '".$fechaTermino."')"
        );

	$cantidad=mysqli_num_rows($sql);

	$sql1 = mysqli_query($con,"select idpersonal,nombres, apellidos from personal where Cargo = 'Operario' and idArea = 2");

	$count1=mysqli_num_rows($sql1);

	if($count1==$cantidad)
	{
		?>
			<script language="JavaScript" type="text/javascript">				     
				swal("ERROR!", "No hay personal disponible para esa fecha!", "error");
				$('#asignar_personal').modal('hide');  
			</script>
		<?php
	}
	else
	{
		$sql2=mysqli_query($con,"select count(id_personal) as cantidad  from tmp_personal where  ((FechaInicio_tmp <= '".$fechaInicio."'
    					AND FechaFinal_tmp >= '".$fechaTermino."') 
       			 OR FechaInicio_tmp BETWEEN '".$fechaInicio."' AND '".$fechaTermino."'
        OR FechaFinal_tmp BETWEEN '".$fechaInicio."' AND '".$fechaTermino."') and id_pedido = '".$idpedido."' and session_id='".$session_id."'");
		
				while ($row2=mysqli_fetch_array($sql2)){

							$count2 = $row2["cantidad"];
				}
		
	?>
	<form method="POST" id="tablaPersonal" name="tablaPersonal">
		<table class="table" >
		<tr>
			<th class='text-center'>SELECCIONAR</th>
			<th class='text-center'>PERSONAL DE OPERACIONES</th>
		</tr>
		<?php

			$numero = 0;
			while ($row1=mysqli_fetch_array($sql1))
			{
				$bool = 0;
				$idpersonal_1=$row1["idpersonal"];

				$sql=mysqli_query($con,"select DISTINCT idpersonal from cotizacion inner join cotizacion_personal on cotizacion_personal.idcotizacion = cotizacion.idcotizacion 
					WHERE ((FechaInicio <= '".$fechaInicio."'
    				AND FechaTermino >= '".$fechaTermino."') 
        			OR FechaInicio BETWEEN '".$fechaInicio."' AND '".$fechaTermino."'
        			OR FechaTermino BETWEEN '".$fechaInicio."' AND '".$fechaTermino."')"
        			);
				while ($row=mysqli_fetch_array($sql))
				{
					$idpersonal=$row["idpersonal"];
					if($idpersonal==$idpersonal_1)
					{
					  	$bool=1;
					}	
				}

				if($bool==0)
				{
					$check = "";
					if($count2>0)
					{
						$sql2=mysqli_query($con,"select id_Personal from tmp_personal where id_pedido = ".$idpedido." and session_id='".$session_id."' and id_Personal='".$idpersonal_1."'");

						$contar_2 = mysqli_num_rows($sql2);						
						if($contar_2>0)
						{
						  $check = "checked";
						}
					} 

					$Nombres=$row1["nombres"];
					$Apellidos=$row1["apellidos"];
					$NombreC = $Nombres." ".$Apellidos;
					$numero++;
					?>
					<tr>
						<td class='text-center'><input type="checkbox" id="seleccion" mane="seleccion" value="<?php echo $idpersonal_1; ?>" <?php echo $check; ?> ></td>
						<td class='text-center'><?php echo $NombreC;?></td>
					</tr>
					<?php 
				}
			}
			?>
			</table>
		  </form>
		<?php
		}
	?>
	