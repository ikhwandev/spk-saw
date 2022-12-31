<?php
require "koneksi.php";
$alternatif = $_POST['alternatif'];
// $x = $db->query($sql);
// var_dump($x);
$sql = "INSERT INTO saham_saw (nama_saham) VALUES ('$alternatif')";

if ($db->query($sql) === true) {
    header("Location: alternatif.php");
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}

