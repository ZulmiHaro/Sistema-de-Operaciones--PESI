<?php
	
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }

	$title="Editar Cotizacion | LIMPSA ";
	
	/* Connect To Database*/
	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
	
	if (isset($_GET['idcotizacion']))
	{
		
		$idcotizacion=intval($_GET['idcotizacion']);
		$campos="clientes.nombre_cliente, clientes.telefono_cliente, clientes.email_cliente, cotizacion.FechaInicio, cotizacion.FechaTermino, cotizacion.Estado_Cotizacion, cotizacion.idPedido,pedido.FechaInicio as fecha_Deseada ,tipo_servicio.descripcion_servicio , pedido.AreaTotal, pedido.Estado_Ambientes  ";
		$sql_cotizacion=mysqli_query($con,"select $campos from tipo_servicio,cotizacion,pedido,clientes where tipo_servicio.idTipoServicio=pedido.idTipoServicio and pedido.id_cliente=clientes.id_cliente and cotizacion.idpedido=pedido.idpedido and idcotizacion='".$idcotizacion."'");
		$count=mysqli_num_rows($sql_cotizacion);
		if ($count==1)
		{
				$rw_cotizacion=mysqli_fetch_array($sql_cotizacion);			
				$nombre_cliente=$rw_cotizacion['nombre_cliente'];
				$telefono_cliente=$rw_cotizacion['telefono_cliente'];
				$email_cliente=$rw_cotizacion['email_cliente'];				
				$fecha_Inicio=date('Y-m-d', strtotime($rw_cotizacion['FechaInicio']));
				$fecha_Termino=date('Y-m-d', strtotime($rw_cotizacion['FechaTermino']));
				$fecha_Deseada=date('Y-m-d', strtotime($rw_cotizacion['fecha_Deseada']));
				$estado_cotizacion=$rw_cotizacion['Estado_Cotizacion'];
				$idpedido=$rw_cotizacion['idPedido'];
				$Servicio=$rw_cotizacion['descripcion_servicio'];
				$AreaTotal=$rw_cotizacion['AreaTotal'];
				$Estado_ambientes=$rw_cotizacion['Estado_Ambientes'];
				$_SESSION['idcotizacion']=$idcotizacion;
				$_SESSION['idpedido']=$idpedido;

		}
		else
		{
			header("location: Cotizacion.php");
			exit;	
		}
	} 
	else 
	{
		header("location: Cotizacion.php");
		exit;
	}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
	<?php 
			include("head.php");		
			include("modal/buscar_productos.php");
			include("modal/detalle_pedido.php");
			include("modal/actualizar_cantidad_material.php");
			include("modal/asignar_personal.php");
	?>	 
	<link href="css/sweetalert.css" rel="stylesheet" type="text/css"/>
  </head>
  <body class="hold-transition skin-blue sidebar-mini";>
  <input type="hidden" value="<?php echo $idpedido; ?>" id="idpedido_1" >
  <input type="hidden" value="<?php echo $idcotizacion; ?>" id="idcotizacion_1" >
  <div class="wrapper">
	<?php
	include("navbar.php");
	?>  
	 <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        
        <!-- Main content -->
        <section class="content">
          
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Sistema de Ventas</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>                    
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  	<div class="row">
	                  	<div class="col-md-12">
		                          <!--Contenido-->                             
								<div class="panel panel-info">
								<div class="panel-heading">
									<h4><i class='glyphicon glyphicon-edit'></i> Editar Cotización</h4>
								</div>
								<div class="panel-body">
								<?php 									 
									
								?>
									<form class="form-horizontal" role="form" id="datos_cotizacion">
										<div class="form-group row">
										  <label for="nombre_cliente" class="col-md-1 control-label">Cliente</label>
										  <div class="col-md-3">
											  		<input type="text" class="form-control input-sm" id="nombre_cliente" placeholder="Nombre"  value="<?php echo $nombre_cliente; ?>" readonly>
											  		<input id="idpedido" type='hidden'>	
										  </div>
										  <label for="tel1" class="col-md-1 control-label">Teléfono</label>
													<div class="col-md-2">
														<input type="text" class="form-control input-sm" id="tel1" placeholder="Teléfono" value="<?php echo $telefono_cliente; ?>" readonly>
													</div>
													<div class="col-md-3">
													<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
												 	<span class="glyphicon glyphicon-plus"></span> Agregar Materiales	</button>
													</div>
											
										 	</div>
											<div class="form-group row">
													<label for="empresa" class="col-md-1 control-label">Inicio</label>
													<div class="col-md-3">
												<input type="date" class="form-control input-sm" id="fechaInicio" value="<?php echo $fecha_Inicio; ?>">
													</div>
													<label for="tel2" class="col-md-1 control-label">Termino</label>
													<div class="col-md-2">
													<input type="date" class="form-control input-sm" id="fechaFinal"
														value="<?php echo $fecha_Termino; ?>"
														>
													</div>	
													<div class="col-md-3">
														<button type="button" class="btn btn-info" data-toggle="modal" data-target="#detalle_pedido">
												 		<span class="glyphicon glyphicon-search"></span> Ver Detalle Pedido
														</button>
													</div>
											</div>

											<div class="col-md-12">
												<div class="col-md-3">
											<a class='btn btn-primary'  onclick="agregar_personal('<?php echo $fecha_Deseada
														;?>');"> <span class="glyphicon glyphicon-user"></span> Asignar Personal</a>
												</div>	
												<div class="col-md-3" id="respuesta_guardar">
												
												<a class="btn btn-success" onclick="guardarCotizacion();" id="guardando" name="guardando">
												  	<span class="glyphicon glyphicon-floppy-disk"></span> ACTUALIZAR INFORMACIÓN 
													</a>
												</div>
											</div>												
									</form>	
								<div class='col-md-12' align="center">
									<h3><b>MATERIALES Y EQUIPOS</b></h3>
								</div>
								<div id="resultados" class='col-md-12' style="margin-top:10px"
								>									
								</div><!-- Carga los datos ajax -->			
								</div>
							</div>		
								  <div class="row-fluid">
									<div class="col-md-12">
									</div>	
								 </div>
															
		                          <!--Fin Contenido-->
                          		</div>
                        	</div>		                    
                  		</div>
                  	</div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!--Fin-Contenido-->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; 2017 </strong> All rights reserved.
      </footer>
    <script src="js/jquery-1.11.2.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- Latest compiled and minified JavaScript -->	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- Latest compiled and minified JavaScript -->
	
	<script type="text/javascript" src="js/VentanaCentrada.js"></script>
	<script type="text/javascript" src="js/editar_cotizacion.js?1.7.0"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script src="js/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/sweetalert.min.js"></script>
    <!-- AdminLTE App -->
    <script src="js/app.min.js"></script>    
  </body>
</html>