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
                <td style="width: 50%; text-align: right"> <?php echo "limpsa.sac "; ?>
                    &copy; <?php  echo  $anio=date('Y'); ?>
                </td>
            </tr>
        </table>
    </page_footer>
   
    <table cellspacing="0" style="width: 100%;">
        <tr>
            <td style="width: 25%; color: #444444;">
                <img style="width: 100%;" src="../../img/logo.jpg" alt="Logo"><br>
            </td>
			<td style="width: 60%; color: #34495e;font-size:12px;text-align:center">
                <span style="color: #34495e;font-size:14px;font-weight:bold"><?php echo NOMBRE_EMPRESA;?></span>
				<br><?php echo DIRECCION_EMPRESA;?><br> 
				Teléfono: <?php echo TELEFONO_EMPRESA;?><br>
				Email: <?php echo EMAIL_EMPRESA;?>
            </td>
        </tr>
    </table>
    <br>
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
        <tr>
           <td style="width:50%;" class='midnight-blue'>REPORTE A </td>
        </tr>
        <tr>
           <td style="width:50%;" >
            <?php 
               
                echo  "REQUERIDO POR : ". $_SESSION['user_nombre'];
                echo "<br>";
                echo "DESDE  ".$start_date."   A   ".$end_date;


                $start_date = $start_date." 00:00:00";
                $end_date = $end_date." 23:59:59";
            ?>            
           </td>
        </tr>
    </table>


       <br>
       <table  border="1" cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
        <tr>           
		  <td style="width:12%; text-align: center" class='midnight-blue'>FECHA REGISTRO</td>
		  <td style="width:30%; text-align: center" class='midnight-blue'>CLIENTE</td>
		  <td style="width:15%; text-align: center" class='midnight-blue'>TELEFONO</td>
           <td style="width:25%; text-align: center" class='midnight-blue'>SERVICIO</td>
		  <td style="width:18%; text-align: center" class='midnight-blue'>TOTAL</td>
        </tr>

        <?php 

            if($servicio == 4)
            {
                $servicio = "";

            }
            else
            {
                $servicio = " and pedido.idTipoServicio = ".$servicio;
            }
        	$sql = mysqli_query($con,"SELECT cotizacion.FechaRegistro, nombre_cliente,telefono_cliente,CostoTotal,idTipoServicio FROM cotizacion, pedido, clientes WHERE pedido.idPedido = cotizacion.idPedido and pedido.id_cliente=clientes.id_cliente and (cotizacion.FechaRegistro BETWEEN '".$start_date."' AND '".$end_date."')  and cotizacion.Estado_Cotizacion = 'Aprobado' ".$servicio." order by cotizacion.FechaRegistro asc");

        	$totalAmount = 0;
			while ($result=mysqli_fetch_array($sql)){	

				$fechaRegistro =$result['FechaRegistro'];
				$Cliente = $result['nombre_cliente'];
				$Telefono = $result['telefono_cliente'];
				$CostoSub = $result['CostoTotal'];
                $Tipo_servicio=$result['idTipoServicio'];

        ?>
		<tr>    


		  <td style="width:12%; text-align: center"><?php echo date("d/m/Y", strtotime($fechaRegistro));?></td>
		  <td style="width:30%; text-align: center"><?php echo $Cliente;?></td>
		  <td style="width:15%; text-align: center"><?php echo $Telefono;?> </td>
           <td style="width:25%; text-align: center" ><?php 
                if ($Tipo_servicio==1){echo "SERVICIO DE LIMPIEZA";}
                elseif ($Tipo_servicio==2){echo "SERVICIO DE FUMIGACION";}
                elseif ($Tipo_servicio==3){echo "SERVICIO DE DESRATIZACION";}               
                ?></td>
		  <td style="width:18%; text-align: center"><?php echo number_format($CostoSub,2);?> </td>
         
        </tr>

        <?php
        		$totalAmount += $result['CostoTotal'];
        	}	
        ?>
        <tr>
        	<td style="width:12%; text-align: center" ></td>
        	<td style="width:30%; text-align: center" ></td>
            <td style="width:15%; text-align: center" ></td>
			<td style="width:25%; text-align: center" >Total</td>
			<td style="width:18%; text-align: center" >S/. <?php echo number_format($totalAmount,2); ?></td>
		</tr>
    </table>
	<br>
</page>

