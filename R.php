<?php
$sql = "SELECT
a.id_saham,
b.nama_saham,
SUM(IF(a.id_kriteria=1,a.nilai,0)) AS C1,
SUM(IF(a.id_kriteria=2,a.nilai,0)) AS C2,
SUM(IF(a.id_kriteria=3,a.nilai,0)) AS C3,
SUM(IF(a.id_kriteria=4,a.nilai,0)) AS C4
FROM
nilai_saw a
JOIN saham_saw b USING (id_saham)
GROUP BY a.id_saham
ORDER BY a.id_saham";
$result = $db->query($sql);
$X = array(1 => array(), 2 => array(), 3 => array(), 4 => array());
while ($row = $result->fetch_object()) {
    array_push($X[1], round($row->C1, 2));
    array_push($X[2], round($row->C2, 2));
    array_push($X[3], round($row->C3, 2));
    array_push($X[4], round($row->C4, 2));
}
$result->free();

$sql = "SELECT
          a.id_saham,
          SUM(
            IF(
              a.id_kriteria=1,
              IF(
                b.jenis='benefit',
                a.nilai/" . max($X[1]) . ",
                " . min($X[1]) . "/a.nilai)
              ,0)
              ) AS C1,
          SUM(
            IF(
              a.id_kriteria=2,
              IF(
                b.jenis='benefit',
                a.nilai/" . max($X[2]) . ",
                " . min($X[2]) . "/a.nilai)
               ,0)
             ) AS C2,
          SUM(
            IF(
              a.id_kriteria=3,
              IF(
                b.jenis='benefit',
                a.nilai/" . max($X[3]) . ",
                " . min($X[3]) . "/a.nilai)
               ,0)
             ) AS C3,
          SUM(
            IF(
              a.id_kriteria=4,
              IF(
                b.jenis='benefit',
                a.nilai/" . max($X[4]) . ",
                " . min($X[4]) . "/a.nilai)
               ,0)
             ) AS C4
        FROM
          nilai_saw a
          JOIN kriteria_saw b USING(id_kriteria)
        GROUP BY a.id_saham
        ORDER BY a.id_saham
       ";
$result = $db->query($sql);
$R = array();
while ($row = $result->fetch_object()) {
    $R[$row->id_saham] = array($row->C1, $row->C2, $row->C3, $row->C4);
}
