<?php
require('library/fpdf.php');
include 'conn.php';

$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(190, 10, 'Data Pesanan', 0, 1, 'C');

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(10, 10, 'No', 1, 0, 'C');
$pdf->Cell(30, 10, 'Kode Pesanan', 1, 0, 'C');
$pdf->Cell(40, 10, 'Nama Pembeli', 1, 0, 'C');
$pdf->Cell(30, 10, 'Jenis Barang', 1, 0, 'C');
$pdf->Cell(30, 10, 'Jumlah', 1, 0, 'C');
$pdf->Cell(50, 10, 'Tanggal Pembelian', 1, 1, 'C');

$pdf->SetFont('Arial', '', 10);

$no = 1;
$data = mysqli_query($koneksi, "SELECT * FROM tpesanan");
while ($d = mysqli_fetch_array($data)) {
    $pdf->Cell(10, 8, $no++, 1, 0, 'C');
    $pdf->Cell(30, 8, $d['kode_pesanan'], 1, 0);
    $pdf->Cell(40, 8, $d['nama'], 1, 0);
    $pdf->Cell(30, 8, $d['jenis_barang'], 1, 0);
    $pdf->Cell(30, 8, $d['jumlah'], 1, 0, 'C');
    $pdf->Cell(50, 8, $d['tggl_pesan'], 1, 1);
}

$pdf->Output();
?>
