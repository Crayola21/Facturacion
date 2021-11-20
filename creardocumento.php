<?php
include('conexion.php');
include('header.php');

if (isset($_POST['registro_documento'])) {
    $tipoidentificacion = $_POST['tipoidentificacion'];
    $numidentificacion = $_POST['numidentificacion'];
    $nombre = $_POST['nombre'];
    $fecha = $_POST['fecha'];
    $producto = $_POST['producto'];
    $descripcion = $_POST['descripcion'];
    $valor = $_POST['valor'];

    $query = "INSERT INTO documento(tipo_identificacion,num_identificacion,nombre,fecha,
    producto,descripcion,valor) VALUES ('$tipoidentificacion','$numidentificacion','$nombre',
    '$fecha','$producto','$descripcion','$valor')";
    $result = mysqli_query($conx, $query);
    if (!$result) {
        echo "<script>alert('Error al guardar')</script>";
    }
    echo "<script>alert('Factura guardad correctamente')</script>";
    $tipoidentificacion = "";
    $numidentificacion = "";
    $nombre = "";
    $fecha = "";
    $producto = "";
    $descripcion = "";
    $valor = "";

    header('Location: creardocumento.php');
}

?>

<div class="content">
    <div class="container ">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Factura</h4>
                    </div>
                    <div class="card-body">
                        <form action="creardocumento.php" method="POST">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Tipo de Identificacion</label>
                                        <input type="text" class="form-control" name="tipoidentificacion" placeholder="Tipo de Identificacion" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Numero de Identificacion</label>
                                        <input type="text" class="form-control" name="numidentificacion" placeholder="Numero de Identificacion" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input type="text" class="form-control" name="nombre" placeholder="Nombre" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Producto</label>
                                        <input type="text" class="form-control" name="producto" placeholder="Producto" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Fecha</label>
                                        <input type="date" class="form-control" name="fecha" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Descripcion</label>
                                        <input type="text" class="form-control" name="descripcion" placeholder="Decripción del producto">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Valor</label>
                                        <input type="text" class="form-control" name="valor" placeholder="Valor producto" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-9">
                                    <button type="submit" name="registro_documento" class="btn btn-info btn-fill">Guardar Factura</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>