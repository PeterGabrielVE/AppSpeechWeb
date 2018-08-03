<?php
	include 'plantilla.php';
	require 'conexion.php';
	
	$query = "SELECT e.id, e.nameE, a.nombreArea, d.texto FROM equipo AS e INNER JOIN area AS a ON e.id=a.id INNER JOIN descripcion AS d ON a.id = d.id";
	$resultado = $mysqli->query($query);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(20,6,'ID',1,0,'C',1);
	$pdf->Cell(40,6,'EQUIPO',1,0,'C',1);
	$pdf->Cell(40,6,'AREA',1,0,'C',1);
	$pdf->MultiCell(70,6,'DESCRIPCION',1,1,'C',1);
	
	$pdf->SetFont('Arial','',10);
	
	while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(20,6,utf8_decode($row['id']),1,0,'C');
		$pdf->Cell(40,6,utf8_decode($row['nameE']),1,0,'C');
		$pdf->Cell(40,6,$row['nombreArea'],1,0,'C');
		$pdf->Cell(70,6,utf8_decode($row['texto']),1,1,'C');
	}
	$pdf->Output();
?>