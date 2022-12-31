<?php
$sql = "SELECT bobot FROM kriteria_saw ORDER BY id_kriteria";
$result = $db->query($sql);
$i = 0;
$W = array();
while ($row = $result->fetch_object()) {
    $W[] = $row->bobot;
}
