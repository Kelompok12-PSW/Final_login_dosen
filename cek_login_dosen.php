<?php

    // aktifkan session php
    session_start();

    // menghubungkan dengan database
    include "functions.php";

    // menangkap data yang dikirim melalui form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // memeriksa apakah data yg diinputkan sesuai dengan yg di database
    $data = mysqli_query($conn, "SELECT * FROM login_dosen WHERE username = '$username' and password = '$password'");

    // menghitung jumlah baris data yg dikembalikan
    $cek = mysqli_num_rows($data);

    // lakukan pengecekan dengan session
    if ($cek > 0 ) {
        $_SESSION["username"] = $username;
        $_SESSION["status"] = "login";
        // redirect ke halaman index, kirim name=pesan dengan value = gagal
        header("Location: home.php");
    }else {
        header("Location: login_dosen.php?pesan=gagal");
    }

?>