<?php
require "koneksi.php";
$id = $_POST['id_nilai'];
$id_saham = $_POST['id_saham'];
$id_kriteria = $_POST['id_kriteria'];
$nilai = $_POST['nilai'];

$sql = "UPDATE nilai_saw SET id_saham='$id_saham', id_kriteria='$id_kriteria', nilai='$nilai' WHERE id_nilai='$id'";
$result = $db->query($sql);

if ($result === true) {
    header("Location: matrik.php");
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}


