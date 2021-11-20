<?php
include "conexion.php";

session_start();



if (isset($_POST["submit"])) {
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $clave = $_POST["clave"];
    $cclave = $_POST["cclave"];

    if ($clave == $cclave) {
        $sql = "SELECT * FROM usuario WHERE correo ='$correo'";
        $result = mysqli_query($conx, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO usuario (nombre,correo,clave) VALUE ('$nombre','$correo','$clave')";
            $result = mysqli_query($conx, $sql);

            if ($result) {
                echo "<script>alert('usuario registrado correctamente')</script>";
                $nombre = "";
                $correo = "";
                $clave = "";
                $cclave = "";
            } else {
                echo "<script>alert('error al registrar')</script>";
            }
        } else {
            echo "<script>alert('el usuario ya esta registrado')</script>";
        }
    } else {
        echo "<script>alert('contraseñas no coinciden')</script>";
    }
}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css.css">
	<title>Formulario de registro</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-correo">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Registro</p>
			<div class="input-group">
				<input type="text" placeholder="Usuario" name="nombre" required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Correo" name="correo"  required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Contraseña" name="clave"  required>
            </div>
            <div class="input-group">
				<input type="password" placeholder="Confirmar contraseña" name="cclave"  required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Registrarme</button>
			</div>
			
		</form>
	</div>
</body>
</html>