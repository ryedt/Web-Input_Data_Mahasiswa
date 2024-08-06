<?php
// memanggil library FPDF
require('fpdf.php');
include 'koneksi.php';
 
// intance object dan memberikan pengaturan halaman PDF
$pdf=new FPDF('L','mm','A4');
$pdf->AddPage();

$pdf->SetFont('Times','B',14);
$pdf->Cell(277,10,'DATA MAHASISWA',0,1,'C');
$pdf->Cell(277,10,'ITS MANDIRI BALANGAN',0,0,'C');
 
$pdf->Cell(10,15,'',0,1);
$pdf->SetFont('Times','B',9);
$pdf->Cell(10,7,'NO',1,0,'C');
$pdf->Cell(25,7,'NIM' ,1,0,'C');
$pdf->Cell(60,7,'NAMA' ,1,0,'C');
$pdf->Cell(30,7,'TEMPAT LAHIR' ,1,0,'C');
$pdf->Cell(50,7,'TANGGAL LAHIR' ,1,0,'C');
$pdf->Cell(50,7,'TELP',1,0,'C');
$pdf->Cell(50,7,'EMAIL',1,0,'C');
 
 
$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Times','',12);
$no=1;
$data = mysqli_query($koneksi,"SELECT * FROM mahasiswa ORDER BY Nama ASC");
while($d = mysqli_fetch_array($data)){
  $pdf->Cell(10,6, $no++,1,0,'C');
  $pdf->Cell(25,6, $d['Nim'],1,0,'C');
  $pdf->Cell(60,6, $d['Nama'],1,0);  
  $pdf->Cell(30,6, $d['Tempat_Lahir'],1,0,'C');
  $pdf->Cell(50,6, $d['Tanggal_Lahir'],1,0,'C');
  $pdf->Cell(50,6, $d['Telp'],1,0,'C');
  $pdf->Cell(50,6, $d['Email'],1,1,'C');
}
 
$pdf->Output();
 
?>