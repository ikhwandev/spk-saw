<?php
require "koneksi.php";
$id = $_POST['id_saham'];
$alternatif = $_POST['alternatif'];
$sql = "UPDATE saham_saw SET nama_saham ='$alternatif' WHERE id_saham='$id'";
$result = $db->query($sql);
header("Location: alternatif.php");
