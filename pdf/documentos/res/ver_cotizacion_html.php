<style type="text/css">
<!--
table { vertical-align: top; }
tr    { vertical-align: top; }
td    { vertical-align: top; }
.midnight-blue{
	background:#2c3e50;
	padding: 4px 4px 4px;
	color:white;
	font-weight:bold;
	font-size:12px;
}
.silver{
	background:white;
	padding: 3px 4px 3px;
}
.clouds{
	background:#ecf0f1;
	padding: 3px 4px 3px;
}
.border-top{
	border-top: solid 1px #bdc3c7;
	
}
.border-left{
	border-left: solid 1px #bdc3c7;
}
.border-right{
	border-right: solid 1px #bdc3c7;
}
.border-bottom{
	border-bottom: solid 1px #bdc3c7;
}
table.page_footer {width: 100%; border: none; background-color: white; padding: 2mm;border-collapse:collapse; border: none;}
}
-->
</style>
<page backtop="15mm" backbottom="15mm" backleft="15mm" backright="15mm" style="font-size: 12pt; font-family: arial" >
        <page_footer>
        <table class="page_footer">
            <tr>

                <td style="width: 50%; text-align: left">
                    P&aacute;gina [[page_cu]]/[[page_nb]]
                </td>
                <td style="width: 50%; text-align: right">
                    &copy; <?php echo "limpsa.sac "; echo  $anio=date('Y'); ?>
                </td>
            </tr>
        </table>
    </page_footer>
    <table cellspacing="0" style="width: 100%;">
        <tr>
            <td style="width: 25%; color: #444444;">
                <img style="width: 100%;" src="../../img/logo.jpg" alt="Logo"><br>
            </td>
			<td style="width: 40%; color: #34495e;font-size:12px;text-align:center">
                <span style="color: #34495e;font-size:14px;font-weight:bold"><?php echo NOMBRE_EMPRESA;?></span>
				<br><?php echo DIRECCION_EMPRESA;?><br> 
				Teléfono: <?php echo TELEFONO_EMPRESA;?><br>
				Email: <?php echo EMAIL_EMPRESA;?>
            </td>
			<td style="width: 25%;text-align:right">
			COTIZACION Nº <?php echo $numero_cotizacion;?>
			</td>
			
        </tr>
    </table>
    <br>
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
        <tr>
           <td style="width:50%;" class='midnight-blue'>DATOS DEL CLIENTE : </td>
        </tr>
		<tr>
           <td style="width:50%;" >
			<?php 
				$sql_cliente=mysqli_query($con,"select * from clientes where id_cliente='$id_Cliente'");
				$rw_cliente=mysqli_fetch_array($sql_cliente);
				echo $rw_cliente['nombre_cliente'];
				echo "<br>";
				echo $rw_cliente['direccion_cliente'];
				echo "<br> Teléfono: ";
				echo $rw_cliente['telefono_cliente'];
				echo "<br> Email: ";
				echo $rw_cliente['email_cliente'];
				
			?>
			
		   </td>
        </tr>
    </table>
    
       <br>
       <table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
        <tr>           
		  <td style="width:25%;" class='midnight-blue'>FECHA INICIO</td>
		  <td style="width:25%;" class='midnight-blue'>FECHA TERMINO</td>
		  <td style="width:40%;" class='midnight-blue'>SERVICIO</td>
        </tr>
		<tr>           
		  <td style="width:25%;"><?php echo date("d/m/Y", strtotime($fecha_Inicio));?></td>
		  <td style="width:25%;"><?php echo date("d/m/Y", strtotime($fecha_Termino));?></td>
		   <td style="width:40%;" >
				<?php 
				if ($Tipo_servicio==1){echo "SERVICIO DE LIMPIEZA";}
				elseif ($Tipo_servicio==2){echo "SERVICIO DE FUMIGACION";}
				elseif ($Tipo_servicio==3){echo "SERVICIO DE DESRATIZACION";}				
				?>
		   </td>
        </tr>
    </table>
	<br>

	<br>
	<table cellspacing="0" style="width: 100%; text-align: left; font-size: 13pt;">
       		 <tr>
           <td style="width:90%; text-align:center" class='midnight-blue'>DATOS DEL INMUEBLE:</td>
        </tr>
       </table>
       
  <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
  		
        <tr>
        	<th style="width: 5%;text-align:center" class='midnight-blue'>#</th>
            <th style="width: 25%;text-align:center" class='midnight-blue'>AMBIENTE</th>
            <th style="width: 25%" class='midnight-blue'>TIPO PISO</th>
            <th style="width: 25%" class='midnight-blue'>COLOR</th>
            <th style="width: 10%" class='midnight-blue'>AREA</th>
        </tr>

<?php
$nums=1;
$sumador_total=0;
$sql=mysqli_query($con, "SELECT descripcion_ambiente,TipoPiso,Color,Area FROM detalle_ambiente, ambiente WHERE detalle_ambiente.idpedido=".$id_pedido."  and ambiente.idAmbiente=detalle_ambiente.idAmbiente ");

while ($row=mysqli_fetch_array($sql))
	{
		$Ambiente=$row['descripcion_ambiente'];						
		$TipoPiso=$row['TipoPiso'];						
		$Color=$row['Color'];
		$Area=$row['Area'];
		if($Color=="")
		{
		  $Color ="---";
		}
	if ($nums%2==0){
		$clase="clouds";
	} else {
		$clase="silver";
	}
	?>

        <tr>
        	<td class='<?php echo $clase;?>' style="width: 5%; text-align: center"><?php echo $nums; ?></td>
            <td class='<?php echo $clase;?>' style="width: 25%; text-align: center"><?php echo $Ambiente; ?></td>
            <td class='<?php echo $clase;?>' style="width: 25%; text-align: left"><?php echo $TipoPiso;?></td>
            <td class='<?php echo $clase;?>' style="width: 25%; text-align: left"><?php echo $Color;?></td>
            <td class='<?php echo $clase;?>' style="width: 10%; text-align: left"><?php echo $Area;?>m<SUP>2</SUP></td>
            
        </tr>

	<?php 

	
	$nums++;
	}	
?>
    </table>
    <br>
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
        <tr>
           <td style="width:90%;" class='midnight-blue'>ACTIVIDADES A REALIZAR : </td>
        </tr>
		<tr>
           <td style="width:90%;" >
			<?php 


				$sql_actividad=mysqli_query($con,"select * from actividad,detalle_actividad where actividad.id_actividad =detalle_actividad.id_actividad and detalle_actividad.id_pedido = ".$id_pedido."");
				while ($row_actividad=mysqli_fetch_array($sql_actividad))
				{
					echo $row_actividad['descripcion_actividad'];
					echo "<br>";
				}					
			?>			
		   </td>
        </tr>
    </table>
	<br>
	<table cellspacing="0" style="width: 100%; text-align: left; font-size: 13pt;">
       		 <tr>
           <td style="width:85%; text-align:center" class='midnight-blue'>MATERIALES / EQUIPOS:</td>
        </tr>
     </table>
     

     <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
        <tr>
        	<th style="width: 5%;text-align:center" class='midnight-blue'>#</th>
            <th style="width: 10%;text-align:center" class='midnight-blue'>CANT.</th>
            <th style="width: 50%; text-align: center" class='midnight-blue'>DESCRIPCION</th>
            <th style="width: 20%" class='midnight-blue'>TIPO MATERIAL</th>
        </tr>

<?php
$nums=1;

$sql=mysqli_query($con, "select * from material_equipo, tipo_material, cotizacion_material where material_equipo.idMaterial = cotizacion_material.idMaterial and material_equipo.idTipoMaterial = tipo_Material.idTipoMaterial and cotizacion_material.idCotizacion = '".$idCotizacion."'");

while ($row=mysqli_fetch_array($sql))
	{
	$cantidad=$row["Cantidad"];
	$descripcion=$row['Descripcion'];
	$tipo_material_descripcion=$row['descripcion_tipo_material'];	
	
	if ($nums%2==0){
		$clase="clouds";
	} else {
		$clase="silver";
	}
	?>

        <tr>
            <td class='<?php echo $clase;?>' style="width: 5%; text-align: center"><?php echo $nums; ?></td>
            <td class='<?php echo $clase;?>' style="width: 10%; text-align: center"><?php echo $cantidad;?></td>
            <td class='<?php echo $clase;?>' style="width: 50%;text-align: center"><?php echo $descripcion;?></td>
          <td class='<?php echo $clase;?>' style="width: 20%"><?php echo $tipo_material_descripcion;?></td>
            
        </tr>

	<?php 	
	$nums++;
	}

	?>    
	</table>
	<br>
	<table cellspacing="0" style="width: 100%; text-align: left; font-size: 13pt;">
       		 <tr>
           <td style="width:85%; text-align:center" class='midnight-blue'>PERSONAL ASIGNADO : </td>
        </tr>
     </table>
	<table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
        <tr>           
		  <td style="width:25%; text-align: center" class='midnight-blue'>DNI</td>
		  <td style="width:35%;" class='midnight-blue'>APELLIDOS Y NOMBRES</td>
		  <td style="width:25%;" class='midnight-blue'>CARGO</td>
        </tr>
			<?php 

				$nums=1;
				$sql_personal=mysqli_query($con,"select * from personal,cotizacion_personal where personal.idPersonal = cotizacion_personal.idPersonal and cotizacion_personal.idCotizacion =  ".$idCotizacion."");
				while ($row_personal=mysqli_fetch_array($sql_personal))
				{
					$DNI =  $row_personal['DNI'];
					$NombreC = $row_personal['Nombres']." ".$row_personal['Apellidos'];
					$Cargo = $row_personal['Cargo'];
					if ($nums%2==0){
						$clase="clouds";
					} else {
						$clase="silver";
					}
					?>

						<tr>				       
				           <td class='<?php echo $clase;?>' style="width: 25%; text-align: center"><?php echo $DNI;?></td>
				            <td class='<?php echo $clase;?>' style="width: 35%"><?php echo $NombreC;?></td>
				          <td class='<?php echo $clase;?>' style="width: 25%"><?php echo $Cargo;?></td>            
        				</tr>
					<?php
					$nums++;
				}					
			?>			
		
    </table>
<br>
<br>
	<div style="font-size:11pt;text-align:left;font-weight:bold">OBSERVACIONES:</div>
	<div style="font-size:11pt;text-align:left;"><u><?php echo $Descripcion_General;?></u></div>

</page>

