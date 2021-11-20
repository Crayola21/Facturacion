<?php

include ('conexion.php');

if(isset($_GET['id_factura'])){
    $id_factura = $_GET['id_factura'];
    $query = "SELECT * FROM documento WHERE id_factura = $id_factura";
    $resultado = mysqli_query($conx,$query);

    if(mysqli_num_rows($resultado) == 1){
        $row = mysqli_fetch_array($resultado);
        $tipo_identificacion = $row['tipo_identificacion'];
        $num_identificacion = $row['num_identificacion'];
        $nombre = $row['nombre'];
        $fecha = $row['fecha'];
        $producto = $row['producto'];
        $descripcion = $row['descripcion'];
        $valor = $row['valor']; 
    }

    if(isset($_POST['actualizar_documento'])){
        $id_factura = $_GET['id_factura'];
        $tipo_identificacion = $_POST['tipo_identificacion'];
        $num_identificacion = $_POST['num_identificacion'];
        $nombre = $_POST['nombre'];
        $fecha = $_POST['fecha'];
        $producto = $_POST['producto'];
        $descripcion = $_POST['descripcion'];
        $valor = $_POST['valor'];

        $query = "UPDATE documento set tipo_identificacion = '$tipo_identificacion', num_identificacion = '$num_identificacion', 
        nombre = '$nombre', fecha = '$fecha', producto = '$producto', descripcion = '$descripcion', valor = '$valor' WHERE id_factura = $id_factura";
        mysqli_query($conx,$query);

    header("Location: facturas.php");
    }
}
?>

<?php include('header.php'); ?>

<div class="contanier">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-body">
                <form action="actualizar.php?id_factura=<?php echo $_GET['id_factura'];?>" method="POST">
                <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Tipo de Identificacion</label>
                                        <input type="text" name="tipo_identificacion" value="<?php echo $tipo_identificacion; ?>" class="form-control"  placeholder="Tipo de Identificacion" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Numero de Identificacion</label>
                                        <input type="text" name="num_identificacion" value="<?php echo $num_identificacion;?>"  class="form-control"  placeholder="Numero de Identificacion" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input type="text" name="nombre" value="<?php echo $nombre;?>"  class="form-control"  placeholder="Nombre" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Producto</label>
                                        <input type="text" name="producto" value="<?php echo $producto?>"  class="form-control"  placeholder="Producto" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Fecha</label>
                                        <input type="date" name="fecha" value="<?php echo $fecha?>"  class="form-control"  required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Descripcion</label>
                                        <input type="text" name="descripcion" value="<?php echo $descripcion?>" class="form-control"  placeholder="Decripción del producto">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Valor</label>
                                        <input type="text" name="valor" value="<?php echo $valor?>"  class="form-control"  placeholder="Valor producto" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-9">
                                    <button name="actualizar_documento" class="btn btn-info btn-fill">actualizar Factura</button>
                                </div>
                            </div>
                </form>
            </div>
        </div>
    </div>

</div>