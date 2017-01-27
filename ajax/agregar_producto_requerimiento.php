<?php

include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
$session_id= session_id();
require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos	
if (isset($_GET['idmaterial']))//codigo elimina un elemento del array
{
		
		$id_tmp=intval($_GET['idmaterial']);
		$action=intval($_GET['action']);
		if($action == 1)
		{
			$delete=mysqli_query($con, "DELETE FROM tmp_materiales WHERE id_tmpMaterial ='".$id_tmp."'");
		}
		else
		{
			$cantidad=$_GET['cantidad'];
			$actualizar = mysqli_query($con, "UPDATE tmp_materiales set cantidad_tmp = $cantidad  WHERE id_tmpMaterial ='".$id_tmp."'");
		}
}
else
{
	
	if (isset($_POST['idmaterial'])){$idmaterial=$_POST['idmaterial'];}
	if($idmaterial != '0')
	{
	if (isset($_POST['cantidad'])){$cantidad=$_POST['cantidad'];}
	if (isset($_POST['precio_venta'])){$precio_venta=$_POST['precio_venta'];}
	if (isset($_POST['depreciacion'])){$depreciacion=$_POST['depreciacion'];}
	
	if (!empty($idmaterial) and !empty($cantidad) and !empty($precio_venta) and !empty($depreciacion))
	{

		$count_query1  = mysqli_query($con, "SELECT count(*) AS numrows FROM tmp_materiales where id_material = ".$idmaterial." and (id_pedido is NULL) and (id_cotizacion is NULL) and session_id ='". $session_id."'");
		$row1= mysqli_fetch_array($count_query1);
		$numrows1 = $row1['numrows'];
		if ($numrows1>0) 
		{
			?>
				<script language="JavaScript" type="text/javascript">
						swal("ERROR!", "Este Material o Equipo ya esta en su lista!.", "error");
						//alert("Este Material o Equipo ya esta en su lista.");
				</script>
			<?php
		}
		else 
		{
		$insert_tmp=mysqli_query($con, "INSERT INTO tmp_materiales(id_material,cantidad_tmp,precio_tmp,depreciacion_tmp,session_id) VALUES ('$idmaterial','$cantidad','$precio_venta','$depreciacion','".$session_id."')");
		}
	}
	}
 
}
?>

<table class="table">
<tr>
	<th class='text-center'>CODIGO</th>
	<th class='text-center'>MATERIAL/EQUIPO</th>
	<th class='text-center'>TIPO</th>
	<th>DEPRECIACION</th>
	<th>CANTIDAD</th>
	<th class='text-right'>UNID MD.</th>
	<th class='text-right'>PRECIO UNIT.</th>
	<th class='text-right'>PRECIO TOTAL</th>
	<th></th>
</tr>
<?php
	$sumador_total=0;
	$sql=mysqli_query($con, "select tmp_materiales.id_tmpMaterial,tmp_materiales.id_Material, Material_equipo.descripcion, Material_equipo.UnidadMedida, tmp_materiales.cantidad_tmp, tmp_materiales.precio_tmp, tmp_materiales.depreciacion_tmp,tipo_material.descripcion_tipo_material from Material_equipo, tmp_materiales,tipo_material where tipo_material.idTipoMaterial = Material_equipo.idTipoMaterial and Material_equipo.idMaterial = tmp_materiales.id_Material and (tmp_materiales.id_pedido is NULL) and (tmp_materiales.id_cotizacion is NULL) and tmp_materiales.session_id='".$session_id."'");
	while ($row=mysqli_fetch_array($sql))
	{
		$id_tmp=$row["id_tmpMaterial"];
		$idMaterial=$row['id_Material'];
		$nombre_Material=$row['descripcion'];
		$tipo_Material=$row['descripcion_tipo_material'];
		$depreciacion = $row['depreciacion_tmp'];
		$undMed = $row['UnidadMedida'];
		$cantidad=$row['cantidad_tmp'];	
		$precio_venta=$row['precio_tmp'];
		$precio_venta_f=number_format($precio_venta,2);//Formateo variables
		$precio_venta_r=str_replace(",","",$precio_venta_f);//Reemplazo las comas
		$precio_total=$precio_venta_r*$cantidad*$depreciacion;
		$precio_total_f=number_format($precio_total,2);//Precio total formateado
		$precio_total_r=str_replace(",","",$precio_total_f);//Reemplazo las comas
		$sumador_total+=$precio_total_r;//Sumador
	
	?>
		<tr>
			<td class='text-center'><?php echo $idMaterial;?></td>
			<td class='text-center'><?php echo $nombre_Material;?></td>
			<td class='text-center'><?php echo $tipo_Material;?></td>
			<td><?php echo $depreciacion;?></td>
			<td><?php echo $cantidad;?></td>
			<td class='text-right'><?php echo $undMed;?></td>
			<td class='text-right'><?php echo $precio_venta_f;?></td>
			<td class='text-right'><?php echo $precio_total_f;?></td>
			<td class='text-center'><a href="#" data-toggle='modal' data-target='#ModalCantidad' onclick="mostrarDatos('<?php echo $id_tmp ?>','<?php echo $cantidad ?>')"><i class="glyphicon glyphicon-pencil"></i></a></td>
			<td class='text-center'><a href="#" onclick="eliminar('<?php echo $id_tmp ?>')"><i class="glyphicon glyphicon-trash"></i></a></td>
		</tr>		
		<?php
	}
	$subtotal=number_format($sumador_total,2,'.','');
?>
<tr>
	<td class='text-right' colspan=4>COSTO POR MATERIALES S/.</td>
	<td class='text-right'><?php echo number_format($subtotal,2);?></td>
	<td></td>
</tr>
</table>
