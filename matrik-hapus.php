<?php
require "koneksi.php";
$id = $_GET['id'];
mysqli_query($db, "delete from nilai_saw where id_saham='$id'");

header("location:./matrik.php");
