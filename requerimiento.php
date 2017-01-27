<?php
	
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }
	
	$title="Requerimiento | LIMPSA";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
	<?php include("head.php");?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css"/>
  </head>
  <body class="hold-transition skin-blue sidebar-mini"; onload="load(1);" >
  <div class="wrapper">
	<?php
	include("navbar.php");
	?>  
	 <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <div id="Respuesta_Eliminar">
        </div>
        <!-- Main content -->
        <section class="content">
          
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Sistema de Operaciones</h3>
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
                   <div class="btn-group pull-right">
                    <a  href="nuevo_requerimiento.php" class="btn btn-info"><span class="glyphicon glyphicon-plus" ></span> Nuevo Requerimiento</a>
                </div>	    
									<h4><i class='glyphicon glyphicon-search'></i> Buscar Requerimiento</h4>
								</div>
									<div class="panel-body">
										<form class="form-horizontal" role="form" id="datos_cotizacion">
										
												<div class="form-group row">
													<label for="q" class="col-md-3 control-label">N° de Requerimiento</label>
													<div class="col-md-5">
														<input type="text" class="form-control" id="q" placeholder="Número del Requerimiento" onkeyup='load(1);'>
													</div>
													
													<div class="col-md-3">
														<button type="button" class="btn btn-default" onclick='load(1);'>
															<span class="glyphicon glyphicon-search" ></span> Buscar</button>                             
														<span id="loader"></span>
													</div>							
												</div>
										</form>
										<div id="resultados"></div><!-- Carga los datos ajax -->
										<div class='outer_div'></div><!-- Carga los datos ajax -->
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
    
    <!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

	<script type="text/javascript" src="js/VentanaCentrada.js"></script>
	<script type="text/javascript" src="js/requerimiento.js?2.6.0"></script>
	<!-- jQuery 2.1.4 -->
    <script src="js/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
     <script src="js/sweetalert.min.js"></script>
    <script src="js/app.min.js"></script>

  </body>
</html>