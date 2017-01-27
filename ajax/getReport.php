<?php 

include('is_logged.php');
require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Co
if($_POST) {

	$startDate = $_POST['startDate'];
	$date = DateTime::createFromFormat('m/d/Y',$startDate);
	$start_date = $date->format("Y-m-d");


	$endDate = $_POST['endDate'];
	$format = DateTime::createFromFormat('m/d/Y',$endDate);
	$end_date = $format->format("Y-m-d");

	$sql = mysqli_query($con,"SELECT * FROM cotizacion, pedido, clientes WHERE pedido.idPedido = cotizacion.idPedido and pedido.id_cliente=clientes.id_cliente and cotizacion.FechaRegistro >= '$start_date' AND cotizacion.FechaRegistro <= '$end_date' and cotizacion.Estado_Cotizacion = 'Aprobado'");

	$table = '
	<table border="1" cellspacing="0" cellpadding="0" style="width:100%;">
		<tr>
			<th>Fecha</th>
			<th>Cliente </th>
			<th>Teléfono</th>
			<th>Total</th>
		</tr>

		<tr>';
		$totalAmount = "";
		while ($result=mysqli_fetch_array($sql)){
			$table .= '<tr>
				<td><center>'.$result['FechaRegistro'].'</center></td>
				<td><center>'.$result['nombre_cliente'].'</center></td>
				<td><center>'.$result['telefono_cliente'].'</center></td>
				<td><center>'.$result['CostoTotal'].'</center></td>
			</tr>';	
			$totalAmount += $result['CostoTotal'];
		}
		$table .= '
		</tr>

		<tr>
			<td colspan="3"><center>Total</center></td>
			<td><center>'.$totalAmount.'</center></td>
		</tr>
	</table>
	';	

	echo $table;

}

?>