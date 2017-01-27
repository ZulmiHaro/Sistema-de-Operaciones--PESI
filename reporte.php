<?php
	
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }	
	$title="Reportes | LIMPSA";

	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
?>
<!DOCTYPE html>
<html lang="en">
  <head>
	<?php 
		include("head.php");
		
	?>	 
	<link href="css/sweetalert.css" rel="stylesheet" type="text/css"/>
  </head>
  <body class="hold-transition skin-blue sidebar-mini";>  
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
                  <h4><i class='glyphicon glyphicon-edit'></i> Nuevo Reporte</h4>
                </div>
                <div class="panel-body">

									<form class="form-horizontal" action="ajax/getReport.php" method="post" id="getOrderReportForm">
									  <div class="form-group">
									    <label for="startDate" class="col-sm-2 control-label">Fecha inicial</label>
									    <div class="col-sm-10">
									      <input type="text" class="form-control" id="startDate" name="startDate" placeholder="Fecha inicial" />
									    </div>
									  </div>
									  <div class="form-group">
									    <label for="endDate" class="col-sm-2 control-label">Fecha final</label>
									    <div class="col-sm-10">
									      <input type="text" class="form-control" id="endDate" name="endDate" placeholder="Fecha final" />
									    </div>
									  </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">Servicio</label>
                      <div class="col-sm-5">
                        <select class='form-control input-sm' id="servicios">
                          <option value="4">-TODOS-</option>
                          <option value="1">SERVICIO DE LIMPIEZA</option>
                          <option value="2">SERVICIO DE FUMIGACION</option>
                          <option value="3">SERVICIO DE DESRATIZACION</option>
                        </select>
                      </div>
                    </div>
									  <div class="form-group">
									    <div class="col-sm-offset-2 col-sm-10">
									      <button type="submit" class="btn btn-success" id="generateReportBtn"> <i class="glyphicon glyphicon-ok-sign"></i> Generar Reporte</button>
									    </div>
									  </div>



									</form>
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
	<script type="text/javascript" src="js/jquery-1.11.2.js"></script>
	<script type="text/javascript" src="js/VentanaCentrada.js"></script>		
	<script type="text/javascript" src="js/reporte.js?3.4.0"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	
    <!-- Bootstrap 3.3.5 -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/sweetalert.min.js"></script>
    <!-- AdminLTE App -->
    <script src="js/app.min.js"></script>    
  </body>
</html>