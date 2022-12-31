<?php

// koneksi db
$db = mysqli_connect("localhost", "root", "", "db_saw");

function query($query) {
    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result)) {
        $rows[] = $row; 
    }
    return $rows;
}

function registrasi($data) {
    global $db;

    $username = strtolower($data["username"]);
    $password = mysqli_real_escape_string($db, $data["password"]);

    //cek username
    $result = mysqli_query($db, "SELECT username FROM user WHERE username = '$username'");
    if(mysqli_fetch_assoc($result) ) {
        echo "<script>
                alert('username sudah terdaftar!')
             </script>";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);
    
    //tambah user ke database
    mysqli_query($db, "INSERT INTO user VALUES ('', '$username', '$password')");

    return mysqli_affected_rows($db);
}