<?php
	
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }
	
	/* Connect To Database*/
	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
	$title="Clientes | Simple Invoice";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include("head.php");?>
  </head>
  <body class="hold-transition skin-blue sidebar-mini"; onload="load(1);">
  <div class="wrapper">
	<?php
	include("navbar.php");
	?>
	 <div class="content-wrapper">
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
	                  	<div class="col-md-12">
		                          <!--Contenido-->         
		                  
							<div class="panel panel-info">
								<div class="panel-heading">
								    <div class="btn-group pull-right">
										<button type='button' class="btn btn-info" data-toggle="modal" data-target="#nuevoCliente"><span class="glyphicon glyphicon-plus" ></span> Nuevo Cliente</button>
									</div>
									<h4><i class='glyphicon glyphicon-search'></i> Buscar Clientes</h4>
								</div>
								<div class="panel-body">
									
									<?php
										include("modal/registro_clientes.php");
										include("modal/editar_clientes.php");
									?>
									<form class="form-horizontal" role="form" id="datos_cotizacion">
										
												<div class="form-group row">
													<label for="q" class="col-md-2 control-label">Cliente</label>
													<div class="col-md-5">
														<input type="text" class="form-control" id="q" placeholder="Nombre del cliente" onkeyup='load(1);'>
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
                  		</div>                  	
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
	
		
	<script type="text/javascript" src="js/clientes.js?3.4.0"></script>
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

















<!--



    <div class="container">
	<div class="panel panel-info">
		<div class="panel-heading">
		    <div class="btn-group pull-right">
				<button type='button' class="btn btn-info" data-toggle="modal" data-target="#nuevoCliente"><span class="glyphicon glyphicon-plus" ></span> Nuevo Cliente</button>
			</div>
			<h4><i class='glyphicon glyphicon-search'></i> Buscar Clientes</h4>
		</div>
		<div class="panel-body">
		
			
			
			<?php/*
				include("modal/registro_clientes.php");
				include("modal/editar_clientes.php");*/
			?>
			<form class="form-horizontal" role="form" id="datos_cotizacion">
				
						<div class="form-group row">
							<label for="q" class="col-md-2 control-label">Cliente</label>
							<div class="col-md-5">
								<input type="text" class="form-control" id="q" placeholder="Nombre del cliente" onkeyup='load(1);'>
							</div>
							<div class="col-md-3">
								<button type="button" class="btn btn-default" onclick='load(1);'>
									<span class="glyphicon glyphicon-search" ></span> Buscar</button>
								<span id="loader"></span>
							</div>
							
						</div>
				
				
				
			</form>
				<div id="resultados"></div><!-- Carga los datos ajax --><!--
				<div class='outer_div'></div><!-- Carga los datos ajax --><!--	
  	</div>
	</div>		 
	</div>
	<hr>
	<?php
	/*include("footer.php");*/
	?>
	-->
	
