<?php
	
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }
	

	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Cont

	$title="Inicio | LIMPSA";
	$fechaHoy = date('Y-m-d');
	$sql=mysqli_query($con,"select * from cotizacion  
		WHERE ((FechaInicio <= '".$fechaHoy."'
    	AND FechaTermino >= '".$fechaHoy."') 
        OR FechaInicio BETWEEN '".$fechaHoy."' AND '".$fechaHoy."'
        OR FechaTermino BETWEEN '".$fechaHoy."' AND '".$fechaHoy."') and  Estado_cotizacion = 'Aprobado'");

	$cantidad_cotizaciones=mysqli_num_rows($sql);

	$sql=mysqli_query($con,"select * from pedido 
		WHERE Estado_pedido= 'Enviado'");

	$cantidad_pedidos=mysqli_num_rows($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>

	
	<!-- bootstrap -->
	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap.min.css">
	<!-- bootstrap theme-->
	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap-theme.min.css">
	<!-- font awesome -->
	<link rel="stylesheet" href="assests/font-awesome/css/font-awesome.min.css">

  <!-- custom css -->
  <link rel="stylesheet" href="custom/css/custom.css">

	<!-- DataTables -->
  <link rel="stylesheet" href="assests/plugins/datatables/jquery.dataTables.min.css">

  <!-- file input -->
  <link rel="stylesheet" href="assests/plugins/fileinput/css/fileinput.min.css">

  <!-- jquery -->
	<script src="assests/jquery/jquery.min.js"></script>
  <!-- jquery ui -->  
  <link rel="stylesheet" href="assests/jquery-ui/jquery-ui.min.css">
  <script src="assests/jquery-ui/jquery-ui.min.js"></script>

  <!-- bootstrap js -->
	<script src="assests/bootstrap/js/bootstrap.min.js"></script>
	<style type="text/css">
		.ui-datepicker-calendar {
			display: none;
		}
	</style>

	<!-- fullCalendar 2.2.5-->
	    <link rel="stylesheet" href="assests/plugins/fullcalendar/fullcalendar.min.css">
	    <link rel="stylesheet" href="assests/plugins/fullcalendar/fullcalendar.print.css" media="print">
<?php include("head.php");?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
 <div class="wrapper">	
<?php
	include("navbar.php");
	?>  
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

					<div class="row">
						
						<div class="col-md-6">
							<div class="panel panel-success">
								<div class="panel-heading">
									
									<a href="pedidos.php" style="text-decoration:none;color:black;">
										Total de Pedidos Pendientes.
										<span class="badge pull pull-right"><?php echo $cantidad_pedidos; ?></span>	
									</a>
									
								</div> <!--/panel-hdeaing-->
							</div> <!--/panel-->
						</div> <!--/col-md-4-->

							<div class="col-md-6">
								<div class="panel panel-info">
								<div class="panel-heading">
									<a href="cotizacion.php" style="text-decoration:none;color:black;">
										Total de Cotizaciones para hoy.
										<span class="badge pull pull-right"><?php echo $cantidad_cotizaciones; ?></span>
									</a>
										
								</div> <!--/panel-hdeaing-->
							</div> <!--/panel-->
							</div> <!--/col-md-4-->


						<div class="col-md-8">
							<div class="panel panel-default">
								<div class="panel-heading"> <i class="glyphicon glyphicon-calendar"></i> Calendario</div>
								<div class="panel-body">
									<div id="calendar"></div>
								</div>	
							</div>
							
						</div>

						<div class="col-md-4">
							<div class="card">
							  <div class="cardHeader">
							    <h1><?php echo date('d'); ?></h1>
							  </div>

							  <div class="cardContainer">
							    <p><?php echo date('l') .' '.date('d').', '.date('Y'); ?></p>
							  </div>
							</div> 
							<br/>

							<div class="card">
							  <div class="cardHeader" style="background-color:#245580;">
							    <h1><?php 
							    		echo '0';
							    		?></h1>
							  </div>

							  <div class="cardContainer">
							    <p> S/. Ingresos totales</p>
							  </div>
							</div> 

						</div>

						

						
					</div> <!--/row-->
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
<!-- fullCalendar 2.2.5 -->
<script src="assests/plugins/moment/moment.min.js"></script>
<script src="assests/plugins/fullcalendar/fullcalendar.js"></script>


<script type="text/javascript">
	$(function () {
			// top bar active
	$('#navDashboard').addClass('active');

      //Date for the calendar events (dummy data)
      var date = new Date();
      var d = date.getDate(),
      m = date.getMonth(),
      y = date.getFullYear();
	 


      $('#calendar').fullCalendar({
		monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
		dayNamesShort: ['Dom','Lun','Mar','Mié','Jue','Vie','Sáb'],
        header: {
          left: '',
          center: 'title'
        },
        buttonText: {
          today: 'today',
          month: 'month'          
        }        
      });


    });
</script>

</div> <!-- container -->
	

	<!-- file input -->
	<script src="assests/plugins/fileinput/js/plugins/canvas-to-blob.min.js'); ?>" type="text/javascript"></script>	
	<script src="assests/plugins/fileinput/js/plugins/sortable.min.js" type="text/javascript"></script>	
	<script src="assests/plugins/fileinput/js/plugins/purify.min.js" type="text/javascript"></script>
	<script src="assests/plugins/fileinput/js/fileinput.min.js"></script>	


	<!-- DataTables -->
	<script src="assests/plugins/datatables/jquery.dataTables.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="js/app.min.js"></script>
</body>
</html>