	<?php
		if (isset($title))
		{
	?>
  <header class="main-header">

        <!-- Logo -->
        <a href="inicio.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><img src="img/logo-menu-icon.png"></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><img src="img/logo-menu.png"></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">  
                  <i class='glyphicon glyphicon-user'>   </i>            
                  <span class="hidden-xs"><?php echo $_SESSION['user_nombre']; ?></span> 
                  <small class="bg-green">online</small>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->                 
                  <!-- Menu Footer-->
                  <li> 
                      <a href="login.php?logout" class="btn btn-default"><i class='glyphicon glyphicon-off'></i> Salir</a>
                    
                  </li>
                </ul>
              </li>
              
            </ul>
          </div>

        </nav>
  </header>
  <!-- Menu desplegable____________________________________________ -->

  <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
                    
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Almacén</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="requerimiento.php"><i class="fa fa-circle-o"></i> Materiales y Equipos</a></li>                
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-shopping-cart"></i>
                <span>Ventas</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="pedidos.php"><i class="fa fa-circle-o"></i> Pedidos</a></li>
                <li><a href="cotizacion.php"><i class="fa fa-circle-o"></i> Cotizaciones</a></li>
                <li><a href="reporte.php"><i class="fa fa-circle-o"></i> Reportes</a></li>
                <li><a href="clientes.php"><i class="fa fa-circle-o"></i> Clientes</a></li>
              </ul>
            </li>
                     
            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Acceso</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="usuarios.php"><i class="fa fa-circle-o"></i> Usuarios</a></li>
                
              </ul>
            </li>
             <li>
              <a href="#">
                <i class="fa fa-plus-square"></i> <span>Ayuda</span>
                <small class="label pull-right bg-red">PDF</small>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-info-circle"></i> <span>Acerca De...</span>
                <small class="label pull-right bg-yellow">IT</small>
              </a>
            </li>
                        
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
   
	<?php
		}
	?>