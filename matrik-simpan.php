<?php
require "koneksi.php";

$id_saham = $_POST['id_saham'];
$id_kriteria = $_POST['id_kriteria'];
$nilai = $_POST['nilai'];

$sql = "INSERT INTO nilai_saw (id_saham, id_kriteria, nilai) VALUES ('$id_saham','$id_kriteria','$nilai')";
$result = $db->query($sql);

if ($result === true) {
    header("Location: matrik.php");
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}

