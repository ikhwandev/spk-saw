<?php

require_once __DIR__ . '/vendor/autoload.php';
require "koneksi.php";
require "W.php";
require "R.php";

$mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);
$html = '<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Hasil Nilai Preferensi</title>
</head>
<body>
    <center><h1>Hasil Nilai Preferensi</h1></center>

    <center><table border="1" cellpadding="10" cellspacing="0">
        <tr>
        <th>No</th>
        <th>Alternatif</th>
        <th>Hasil</th>
    </tr>';

    $P = array();
    $m = count($W);
    $no = 0;
    foreach ($R as $i => $r) {
        for ($j = 0; $j < $m; $j++) {
            $P[$i] = (isset ($P[$i]) ? $P[$i] : 0) + $r[$j] * $W[$j];
          }
        $html.= '<tr>
        <td>'. ++$no . '</td>
        <td>A'. $i . '</td>
        <td>'. $P[$i] . '</td>          
        </tr>';
    }

$html.= '</table></center>

</body>
</html>';
$mpdf->WriteHTML($html);
$mpdf->Output();


