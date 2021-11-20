<?php
include('datoscnx.php');

$conx = mysqli_connect($server,$user,$pass,$database);

if(!$conx){
    die("Error de conexion");
}


?>