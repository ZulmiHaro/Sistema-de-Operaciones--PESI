<?php
	/*-------------------------
	Autor: Obed Alvarado
	Web: obedalvarado.pw
	Mail: info@obedalvarado.pw
	---------------------------*/
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }

	/* Connect To Database*/
	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
	
	$title="Usuarios | LIMPSA";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
	<?php include("head.php");?>
	<link href="css/sweetalert.css" rel="stylesheet" type="text/css"/>
  </head>
  <body  class="hold-transition skin-blue sidebar-mini">
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
                  <h3 class="box-title">Sistema de Acceso</h3>
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
								<button type='button' class="btn btn-info" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus" ></span> Nuevo Usuario</button>
							</div>
							<h4><i class='glyphicon glyphicon-search'></i> Buscar Usuarios</h4>
						</div>			
							<div class="panel-body">
							<?php
							include("modal/registro_usuarios.php");
							include("modal/editar_usuarios.php");
							include("modal/cambiar_password.php");
							?>
							<form class="form-horizontal" role="form" id="datos_cotizacion">
								
										<div class="form-group row">
											<label for="q" class="col-md-2 control-label">Nombres:</label>
											<div class="col-md-5">
												<input type="text" class="form-control" id="q" placeholder="Nombre" onkeyup='load(1);'>
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

    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>


	<script src="js/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="js/app.min.js"></script>
	<script type="text/javascript" src="js/usuarios.js"></script>
	<script src="js/sweetalert.min.js"></script>
  </body>
</html>
<script>
$( "#guardar_usuario" ).submit(function( event ) {
  $('#guardar_datos').attr("disabled", true);
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/nuevo_usuario.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajax").html(datos);
			$('#guardar_datos').attr("disabled", false);
			load(1);
		  }
	});
  event.preventDefault();
})

$( "#editar_usuario" ).submit(function( event ) {
  $('#actualizar_datos2').attr("disabled", true);
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/editar_usuario.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax2").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajax2").html(datos);


			$('#actualizar_datos2').attr("disabled", false);
			load(1);
		  }
	});
  event.preventDefault();
})

$( "#editar_password" ).submit(function( event ) {
  $('#actualizar_datos3').attr("disabled", true);
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/editar_password.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax3").html("Mensaje: Cargando...");
			  },
			success: function(datos){


			$("#resultados_ajax3").html(datos);
			$('#actualizar_datos3').attr("disabled", false);
			load(1);
		  }
	});
  event.preventDefault();
})
function get_user_id(id){
		$("#user_id_mod").val(id);
	}

	function obtener_datos(id){
			var nombres = $("#nombres"+id).val();
			var apellidos = $("#apellidos"+id).val();
			var usuario = $("#usuario"+id).val();
			var email = $("#email"+id).val();
			
			$("#mod_id").val(id);
			$("#firstname2").val(nombres);
			$("#lastname2").val(apellidos);
			$("#user_name2").val(usuario);
			$("#user_email2").val(email);
			
		}
</script>


<!--

    <div class="container">
		<div class="panel panel-info">
		<div class="panel-heading">
		    <div class="btn-group pull-right">
				<button type='button' class="btn btn-info" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus" ></span> Nuevo Usuario</button>
			</div>
			<h4><i class='glyphicon glyphicon-search'></i> Buscar Usuarios</h4>
		</div>			
			<div class="panel-body">
			<?php/**
			include("modal/registro_usuarios.php");
			include("modal/editar_usuarios.php");
			include("modal/cambiar_password.php");*/
			?>
			<form class="form-horizontal" role="form" id="datos_cotizacion">
				
						<div class="form-group row">
							<label for="q" class="col-md-2 control-label">Nombres:</label>
							<div class="col-md-5">
								<input type="text" class="form-control" id="q" placeholder="Nombre" onkeyup='load(1);'>
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
	<?php/*
	include("footer.php");*/
	?>-->