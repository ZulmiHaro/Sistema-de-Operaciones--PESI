<?php
	
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: ../../login.php");
		exit;
    }
	/* Connect To Database*/
	include("../../config/db.php");
	include("../../config/conexion.php");
	$idCotizacion= intval($_GET['idcotizacion']);
	$sql_count=mysqli_query($con,"select * from cotizacion where idCotizacion='".$idCotizacion."'");
	$count=mysqli_num_rows($sql_count);
	if ($count==0)
	{
	echo "<script>alert('Cotizacion no encontrada')</script>";
	echo "<script>window.close();</script>";
	exit;
	}
	$sql_Cotizacion=mysqli_query($con,"select * from cotizacion,pedido where Pedido.idPedido = cotizacion.idPedido and idCotizacion='".$idCotizacion."'");
	$rw_Cotizacion=mysqli_fetch_array($sql_Cotizacion);
	$numero_cotizacion=$rw_Cotizacion['idcotizacion'];
	$id_pedido=$rw_Cotizacion['idPedido'];
	$id_Cliente=$rw_Cotizacion['id_cliente'];
	$fecha_Inicio=$rw_Cotizacion['FechaInicio'];
	$fecha_Termino=$rw_Cotizacion['FechaTermino'];
	$Tipo_servicio=$rw_Cotizacion['idTipoServicio'];
	$Descripcion_General=$rw_Cotizacion['DescripcionGeneral'];
	require_once(dirname(__FILE__).'/../html2pdf.class.php');
    // get the HTML
     ob_start();
    include(dirname('__FILE__').'/res/ver_cotizacion_html.php');
    $content = ob_get_clean();

    try
    {
        // init HTML2PDF
        $html2pdf = new HTML2PDF('P', 'LETTER', 'es', true, 'UTF-8', array(0, 0, 0, 0));
        // display the full page
        $html2pdf->pdf->SetDisplayMode('fullpage');
        // convert
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        // send the PDF
        $html2pdf->Output('Cotizacion_'.$numero_cotizacion.'.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
