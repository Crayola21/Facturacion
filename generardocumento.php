<?php

include "fpdf/fpdf.php";

$pdf = new FPDF($orientation='P',$unit='mm');
$pdf->AddPage();
$pdf->SetFont('Arial','B',20);    
$textypos = 5;
$pdf->setY(12);
$pdf->setX(10);

$pdf->Cell(5,$textypos,"SENA");
$pdf->SetFont('Arial','B',10);    
$pdf->setY(30);$pdf->setX(10);
$pdf->Cell(5,$textypos,"DE:");
$pdf->SetFont('Arial','',10);    
$pdf->setY(35);$pdf->setX(10);
$pdf->Cell(5,$textypos,"SENA");

require('conexion.php');
$consulta = "SELECT * FROM documento";
$resultado = mysqli_query($conx,$consulta);


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

}

$pdf->SetFont('Arial','B',10);    
$pdf->setY(30);$pdf->setX(75);
$pdf->Cell(5,$textypos,"PARA:");
$pdf->SetFont('Arial','',10);    
$pdf->setY(35);$pdf->setX(75);
$pdf->Cell(5,$textypos,"'$nombre'");
$pdf->setY(45);$pdf->setX(75);

$pdf->SetFont('Arial','B',10);    
$pdf->setY(30);$pdf->setX(135);
$pdf->Cell(5,$textypos,"FACTURA #$id_factura" );
$pdf->SetFont('Arial','',10);    
$pdf->setY(35);$pdf->setX(135);
$pdf->Cell(5,$textypos,"Fecha: $fecha");
$pdf->setY(40);$pdf->setX(135);
$pdf->Cell(5,$textypos,"");
$pdf->setY(50);$pdf->setX(135);
$pdf->Cell(5,$textypos,"");


$pdf->setY(60);$pdf->setX(135);
    $pdf->Ln();
$header = array("Producto","Descripcion","Valor Total");
$products = array(
	array($producto, $descripcion,$valor)
);
    $w = array(20, 95, 20, 25, 25);
    for($i=0;$i<count($header);$i++)
        $pdf->Cell($w[$i],7,$header[$i],1,0,'C');
    $pdf->Ln();
    $total = 0;
    foreach($products as $row)
    {
        $pdf->Cell($w[0],2,$row[0],1);

        $pdf->Ln();

    }

$yposdinamic = 60 + (count($products)*10);

$pdf->setY($yposdinamic);
$pdf->setX(235);
    $pdf->Ln();
$header = array("", "");
$data2 = array(
	array("Total", $valor),
);
    $w2 = array(40, 40);

    $pdf->Ln();
    foreach($data2 as $row)
    {
$pdf->setX(115);
        $pdf->Cell($w2[0],6,$row[0],1);
        $pdf->Cell($w2[1],6,"$ ".number_format($row[1], 2, ".",","),'1',0,'R');

        $pdf->Ln();
    }


$pdf->output();

?>