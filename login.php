<?php
// checking for minimum PHP version
if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    // if you are using PHP 5.3 or PHP 5.4 you have to include the password_api_compatibility_library.php
    // (this library adds the PHP 5.5 password hashing functions to older versions of PHP)
    require_once("libraries/password_compatibility_library.php");
}

// include the configs / constants for the database connection
require_once("config/db.php");

// load the login class
require_once("classes/Login.php");

// create a login object. when this object is created, it will do all login/logout stuff automatically
// so this single line handles the entire login process. in consequence, you can simply ...
$login = new Login();

// ... ask if we are logged in here:
if ($login->isUserLoggedIn() == true) {
    // the user is logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are logged in" view.
   header("location: inicio.php");

} else {
    // the user is not logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are not logged in" view.
    ?>
	<!DOCTYPE html>
<html lang="es">
<head>
  
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>LIMPSA | Login</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <!-- CSS  -->
   <link href="css/sweetalert.css" rel="stylesheet" type="text/css"/>
   <link href="css/login_4.css" type="text/css" rel="stylesheet" media="screen,projection"/>
   <link rel=icon href='img/logo-icon1.png' sizes="32x32" type="image/png">
    <style>
         .flex-caption {
			  width: 100%;
			  padding: 0.5%;
			  left: 0;
			  bottom: 0;
			  background: rgba(0,0,0,.5);
			  color: #fff;
			  text-shadow: 0 -1px 0 rgba(0,0,0,.3);
			  font-size: 28px;
			  line-height: 18px;
			}
         .animated {            
            background-repeat: no-repeat;
            background-position:left top;            
            padding-top: 0px;
            margin-bottom:0px;
            -webkit-animation-duration: 5s;
            animation-duration: 5s;
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
         }
         
         @-webkit-keyframes fadeInDown {
            0% {
               opacity: 0;
               -webkit-transform: translateY(0px);
            }
            100% {
               opacity: 1;
               -webkit-transform: translateY(0);
            }
         }
         
         @keyframes fadeInDown {
            0% {
               opacity: 0;
               transform: translateY(0px);
            }
            100% {
               opacity: 1;
               transform: translateY(0);
            }
         }
         
         .fadeInDown {
            -webkit-animation-name: fadeInDown;
            animation-name: fadeInDown;
         }
    </style>
</head>
<body>
 <div class="container">
        <div class="card card-container">
            <img id="profile-img" class="profile-img-card" src="img/avatar_2x.1.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form method="post" accept-charset="utf-8" action="login.php" name="loginform" autocomplete="off" role="form" class="form-signin">
			<?php
				// show potential errors / feedback (from login object)
				if (isset($login)) {
					if ($login->errors) {
						?>
						<div class="alert alert-danger alert-dismissible" role="alert">
						    <strong>Error!</strong> 
						
						<?php 
						foreach ($login->errors as $error) {
							echo $error;
						}
						?>
						</div>
						<?php
					}
					if ($login->messages) {
						?>
						<div class="alert alert-success alert-dismissible" role="alert">
						    <strong>Aviso!</strong>
						<?php
						foreach ($login->messages as $message) {
							echo $message;
						}
						?>
						</div> 
						<?php 
					}
				}
				?>
                <span id="reauth-email" class="reauth-email"></span>
                <input class="form-control" placeholder="Usuario" name="user_name" type="text" value="" autofocus="" required>
                <input class="form-control" placeholder="Contraseña" name="user_password" type="password" value="" autocomplete="off" required>
                <button type="submit" class="btn btn-lg btn-success btn-block btn-signin" name="login" id="submit">Iniciar Sesión</button>
            </form><!-- /form -->
           
        </div><!-- /card-container -->
        <div >
                    
          <div class="flex-caption" style="width: 420px; height:120px;"> 
           	 
           	 <h2 class="animated fadeInDown" style=" font: oblique bold 120% cursive;"><img src="img/logo-icon1.png">LIMPSA EMPRESAS</h2>
           	 <p class="animated fadeInDown " style=" font-size: 15px;">Más de 30 años trabajando en limpieza.</p>
           	
          </div> 
                    
          
        </div>        
    </div><!-- /container -->
    <script src="js/sweetalert.min.js"></script>
  </body>
</html>

	<?php
}


