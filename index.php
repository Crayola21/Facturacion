<?php

include "conexion.php";

session_start();
error_reporting(0);

if (isset($_SESSION["nombre"])) {
      header("Location: panel.php");
}

if (isset($_POST["submit"])) {
      $correo = $_POST["correo"];
      $clave = $_POST["clave"];


      $sql = "SELECT * FROM usuario WHERE correo='$correo' AND clave='$clave'";
      $result = mysqli_query($conx, $sql);

      if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['nombre'] = $row['nombre'];
            header("Location: panel.php");
      } else {
            echo "<script>alert('datos incorrectos')</script>";
      }
}


/**$consulta = "SELECT * FROM usuario";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$datos = $resultado->fetchAll();
  foreach($datos as $dato){
        echo $dato['nombre']."<br>";
        echo $dato['correo']."<br>";
        echo $dato['clave']."<br>";
  }**/

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="css.css">

	<title>Iniciar sesión</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-correo">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="correo"  required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Contraseña" name="clave"  required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Acceder</button>
			</div>
			<p class="login-register-text">¿No tienes cuenta?<a href="registro.php">Regístrate aquí</a>.</p>
		</form>
	</div>
</body>
</html>



<!--
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<title>iniciar</title>
</head> 
<body>

      <div class="container">
            <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Inicio De Sesión</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                  </button>
            </div>
            <div class="modal-body">
                  <form method="POST">
                        <div class="form-group">
                              <label for="correo_user_login">Ingrese su usuario y/o Correo Electrónico</label>
                              <input type="email" class="form-control" id="correo_user_login" name="correo_user_login" aria-describedby="emailHelp" placeholder="Ingrese Su Correo y/o Usuario Para Ingresar">
                        </div>
                        <div class="form-group">
                              <label for="exampleInputPassword1">Contraseña</label>
                              <input type="password" class="form-control" id="contrasena_login" name="contrasena_login" placeholder="Ingrese Su Contraseña">
                        </div>
                        <div class="form-group form-check p-3">
                        </div>
                  </form>
            </div>
      </div>

</body>
-->


</html>

