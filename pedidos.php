<?php
	
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }
	
	$title="Pedidos | LIMPSA";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
	<?php include("head.php");?>
  </head>
  <body class="hold-transition skin-blue sidebar-mini"; onload="load(1);" >
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
									<h4><i class='glyphicon glyphicon-search'></i> Buscar Pedido</h4>
								</div>
									<div class="panel-body">
										<form class="form-horizontal" role="form" id="datos_cotizacion">
										
												<div class="form-group row">
													<label for="q" class="col-md-2 control-label">Cliente o # de Pedido</label>
													<div class="col-md-5">
														<input type="text" class="form-control" id="q" placeholder="Nombre del cliente o # de pedido" onkeyup='load(1);'>
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
    </div>

     <!--
    <div class="container">
		<div class="panel panel-info">
		<div class="panel-heading">		    
			<h4><i class='glyphicon glyphicon-search'></i> Buscar Pedido</h4>
		</div>
			<div class="panel-body">
				<form class="form-horizontal" role="form" id="datos_cotizacion">
				
						<div class="form-group row">
							<label for="q" class="col-md-2 control-label">Cliente o # de Pedido</label>
							<div class="col-md-5">
								<input type="text" class="form-control" id="q" placeholder="Nombre del cliente o # de pedido" onkeyup='load(1);'>
							</div>
							
							<div class="col-md-3">
								<button type="button" class="btn btn-default" onclick='load(1);'>
									<span class="glyphicon glyphicon-search" ></span> Buscar</button>
								<span id="loader"></span>
							</div>
							
						</div>
				
				
				
			</form>
				<div id="resultados"></div> <!-- Carga los datos ajax --><!--
				<div class='outer_div'></div><!-- Carga los datos ajax --><!--
			</div>
		</div>			
	</div>
	<hr>
	<?php
	/*include("footer.php");*/
	?>
	-->

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

	<script type="text/javascript" src="js/VentanaCentrada.js"></script>
	<script type="text/javascript" src="js/pedidos.js"></script>
	<!-- jQuery 2.1.4 -->
    <script src="js/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="js/app.min.js"></script>

  </body>
</html>