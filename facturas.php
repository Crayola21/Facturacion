<?php

include('header.php');
include('conexion.php');

?>

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-20">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Facturas Generadas</h4>
          </div>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th class="col-md-2">Numero de factura</th>
                <th class="col-md-1">Tipo de Identificacion</th>
                <th class="col-md-2">Identificacion Cliente</th>
                <th>Nombre de Cliente</th>
                <th>Fecha de factura</th>
                <th>Producto</th>
                <th>Descripcion</th>
                <th>Valor</th>
                <th>*******</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $query = "SELECT * FROM documento";
              $resultado = mysqli_query($conx, $query);

              while ($row = mysqli_fetch_array($resultado)) { ?>
                <tr>
                  <td><?php echo $row['id_factura'] ?></td>
                  <td><?php echo $row['tipo_identificacion'] ?></td>
                  <td><?php echo $row['num_identificacion'] ?></td>
                  <td><?php echo $row['nombre'] ?></td>
                  <td><?php echo $row['fecha'] ?></td>
                  <td><?php echo $row['producto'] ?></td>
                  <td><?php echo $row['descripcion'] ?></td>
                  <td><?php echo $row['valor'] ?></td>
                  <td>
                    <a href="actualizar.php?id_factura=<?php echo $row['id_factura']?>" >
                      <i class="fas fa-edit"></i>
                    </a>
                    <a href="eliminar.php?id_factura=<?php echo $row['id_factura']?>" >
                      <i class="fas fa-trash"></i>
                    </a>
                    <a href="generardocumento.php?id_factura=<?php echo $row['id_factura']?>" >
                      <i class="fas fa-file"></i>
                    </a>
                </tr>


              <?php  }  ?>
            </tbody>

          </table>
        </div>

      </div>
    </div>
  </div>
</div>