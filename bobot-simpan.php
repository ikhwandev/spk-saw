<?php
require "koneksi.php";
$kriteria = $_POST['kriteria'];
$bobot = $_POST['bobot'];
$atribut = $_POST['atribut'];
// $x = $db->query($sql);
// var_dump($x);
$sql = "INSERT INTO kriteria_saw (nama_kriteria, bobot, jenis) VALUES ('$kriteria', '$bobot', '$atribut')";

if ($db->query($sql) === true) {
    header("Location: bobot.php");
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}

