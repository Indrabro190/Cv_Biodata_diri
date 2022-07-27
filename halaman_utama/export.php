<?php

require_once __DIR__ . '/vendor/autoload.php';
require 'config.php';
$biodata = query("SELECT * FROM data_diri");

$mpdf = new \Mpdf\Mpdf();
$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Karyawan</title>
    <link rel="stylesheet" href="../CSS/print.css">
</head>
<body>
<h1 align="center">Biodata Diri</h1>
<table border="1" class="table table-striped table-bordered" cellspacing="0" cellpadding="10" width="100%" style="margin:auto;">
              <thead>
                <tr style="background-color: #3498db;">
                  <th style="text-align:center ;">No</th>
                  <th style="text-align:center ;">Nama</th>
                  <th style="text-align:center ;">Tempat</th>
                  <th style="text-align:center ;">Tgl_lahir</th>
                </tr>';

                $i = 1;
                foreach($biodata as $m){
                    $html .= '<tr>
                        <td  style="text-align:center ; color:black; font-weight:900;">'. $i++ .'</td>
                        <td style="text-align:center ; color:black; font-weight:900;">'. $m["Nama"] .'</td>
                        <td style="text-align:center ; color:black; font-weight:900;">'. $m["Tempat"] .'</td>
                        <td style="text-align:center ; color:black; font-weight:900;">'. $m["Tgl_lahir"] .'</td>
                    </tr>';
                }
$html .='</table>
</body>
</html>';
$mpdf->WriteHTML($html);
$mpdf->Output();
