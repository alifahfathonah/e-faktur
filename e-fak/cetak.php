<?php
require('config/koneksi.php');
require('FPDF/fpdf.php');
$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);
$pdf->text(70,30,'DATA FAKTUR PAJAK KELUARAN');
$pdf->text(75,36,'PT. PUTIMEKAR BERSAMA');
$yi = 50;
$ya = 44;
$pdf->setFont('Arial','',9);
$pdf->setFillColor(222,222,222);
$pdf->setXY(10,$ya);
$pdf->CELL(6,6,'NO',1,0,'C',1);
$pdf->CELL(30,6,'NO FAK',1,0,'C',1);
$pdf->CELL(18,6,'SSP',1,0,'C',1);
$pdf->CELL(25,6,'BUKTI POTONG',1,0,'C',1);
$pdf->CELL(50,6,'INVOICE',1,0,'C',1);
$pdf->CELL(50,6,'DESCRIPTION',1,0,'C',1);
$ya = $yi + $row;
$sql = mysql_query("SELECT * FROM arsip");
$i = 1;
$no = 1;
$max = 31;
$row = 6;
while($data = mysql_fetch_array($sql)){
$pdf->setXY(10,$ya);
$pdf->setFont('arial','',9);
$pdf->setFillColor(255,255,255);
$pdf->cell(6,6,$no,1,0,'C',1);
$pdf->cell(30,6,$data[no_fak],1,0,'L',1);
$pdf->cell(18,6,$data[ssp],1,0,'L',1);
$pdf->CELL(25,6,$data[bupot],1,0,'C',1);
$pdf->CELL(50,6,$data[invoice],1,0,'C',1);
$pdf->CELL(50,6,$data[description],1,0,'C',1);
$ya = $ya+$row;
$no++;
$i++;
$dm[kode] = $data[kdprog];
}
$pdf->text(100,$ya+6,"PADANG , ".$tgl);
$pdf->text(100,$ya+18,"PIMPINAN");
$pdf->output();
?>