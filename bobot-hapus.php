<?php
require "koneksi.php";
$id = $_GET['id'];
mysqli_query($db, "delete from kriteria_saw where id_kriteria='$id'");
header("Location: bobot.php");
