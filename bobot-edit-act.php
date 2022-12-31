<?php
require "koneksi.php";
$id = $_POST['id_kriteria'];
$nama_kriteria = $_POST['nama_kriteria'];
$bobot = $_POST['bobot'];
$atribut = $_POST['atribut'];

$sql = "UPDATE kriteria_saw SET nama_kriteria='$nama_kriteria', bobot='$bobot', atribut='$atribut' WHERE id_kriteria='$id'";
$result = $db->query($sql);
header("Location: bobot.php");
