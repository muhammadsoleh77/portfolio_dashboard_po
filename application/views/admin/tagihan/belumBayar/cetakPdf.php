<?php
// var_dump($dataDetail);
ob_start();

$pdf = new FPDF('l','mm','A5');
    // membuat halaman baru
    $pdf->AddPage();
    // setting jenis font yang akan digunakan
    $pdf->SetFont('Arial','B',16);
    // mencetak string
    $pdf->Cell(190,7,'INVOICE : '.$dataDetail->noinvoice,0,1,'C');
    $pdf->SetFont('Arial','B',12);
    // $pdf->Cell(190,7,'DAFTAR SISWA KELAS IX JURUSAN REKAYASA PERANGKAT LUNAK',0,1,'C');
    // Memberikan space kebawah agar tidak terlalu rapat
    $pdf->Cell(10,7,'',0,1);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(20,6,'BUS CODE',1,0);
    $pdf->Cell(85,6,'ROUTE',1,0);
    $pdf->Cell(27,6,'TRANSACTION',1,0);
    $pdf->Cell(25,6,'MDR (2%)',1,1);
    $pdf->SetFont('Arial','',10);
    foreach ($dataDetail->data as $value){
        $pdf->Cell(20,6,$value->kodeBus,1,0);
        $pdf->Cell(85,6,$value->namaTrayek,1,0);
        $pdf->Cell(27,6,number_format($value->totalTunai),1,0);
        $pdf->Cell(25,6,number_format($value->mdrTunai),1,1);
    }
    $pdf->Output('tes.pdf', 'D');
    ob_end_flush();
?>
