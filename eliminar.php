<?php

include ('conexion.php');

if(isset($_GET['id_factura'])){
    $id_factura = $_GET['id_factura'];
    $query = "DELETE FROM documento WHERE id_factura = $id_factura";
    $resultado = mysqli_query($conx,$query);

    if(!$resultado){
        die("Error al eliminar");
    }

    header("Location: facturas.php");

}