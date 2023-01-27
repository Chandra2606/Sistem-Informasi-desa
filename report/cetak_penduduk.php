<?php
    include "../inc/koneksi.php";
    $Lapor = "SELECT * FROM tb_pdd ORDER by id_penduduk";
    $Hasil = mysql_query($Lapor);
    $Data = array();
    while($row = mysql_fetch_assoc($Hasil)){
        array_push($Data, $row);
    }
    $Judul = "Data Penduduk";
    $tgl= "Time : ".date("l, d F Y");
    $Header= array(
        array("label"=>"id_pend", "length"=>20, "align"=>"L"),
        array("label"=>"nik", "length"=>20, "align"=>"L"),
        array("label"=>"nama", "length"=>60, "align"=>"L"),
        array("label"=>"tempat_lh", "length"=>40, "align"=>"L"),
        array("label"=>"tgl_lh", "length"=>33, "align"=>"L"),
        array("label"=>"jekel", "length"=>30, "align"=>"L"),
        array("label"=>"desa", "length"=>40, "align"=>"L"),
        array("label"=>"rt", "length"=>40, "align"=>"L"),
        array("label"=>"rw", "length"=>40, "align"=>"L"),
        array("label"=>"agama", "length"=>40, "align"=>"L"),
        array("label"=>"kawin", "length"=>40, "align"=>"L"),
        array("label"=>"pendidikan", "length"=>40, "align"=>"L"),
        array("label"=>"perkerjaan", "length"=>40, "align"=>"L"),
        array("label"=>"status", "length"=>40, "align"=>"L"),
    );
    require ("fpdf16/fpdf.php");
    $pdf = new FPDF();
    $pdf->AddPage('P','A4','C');
    $pdf->SetFont('arial','B','15');
    $pdf->Cell(0, 15, $Judul, '0', 1, 'C');
    $pdf->SetFont('arial','i','9');
    $pdf->Cell(0, 10, $tgl, '0', 1, 'P');
    $pdf->SetFont('arial','','12');
    $pdf->SetFillColor(190,190,0);
    $pdf->SetTextColor(255);
    $pdf->setDrawColor(128,0,0);
    foreach ($Header as $Kolom){
        $pdf->Cell($Kolom['length'], 8, $Kolom['label'], 1, '0', $Kolom['align'], true);
    }
    $pdf->Ln();
    $pdf->SetFillColor(244,235,255);
    $pdf->SettextColor(0);
    $pdf->SetFont('arial','','10');
    $fill =false;
    foreach ($Data as $Baris){
        $i= 0;
        foreach ($Baris as $Cell){
            $pdf->Cell ($Header[$i]['length'], 7, $Cell, 2, '0', $Kolom['align'], $fill);
            $i++;
        }
        $fill = !$fill;
        $pdf->Ln();
    }
    $pdf->Output();
?>