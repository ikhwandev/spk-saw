<?php
require "koneksi.php";
$id = $_GET['id'];
mysqli_query($db, "delete from saham_saw where id_saham='$id'");
header("Location: alternatif.php");
