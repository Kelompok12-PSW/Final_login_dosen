<?php

    // koneksi ke database
    $conn = mysqli_connect("localhost", "root", "", "universitas_x");

    // fungsi untuk mengkonversi fize file
    function formatBytes($bytes, $precision = 2) {
        $units = array('B', 'KB', 'MB', 'GB', 'TB');

        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);

        $bytes /= pow(1024, $pow);

        return round($bytes, $precision) . ' ' . $units[$pow];
    }

    // menerima PARAMETER DARI FUNCTION QUERY 
    function query($query) {
        // MENGAMBIL DATA DARI TABEL MAHASISWA LALU SIMPAN DALAM VARIABLE
        global $conn;
        $result = mysqli_query($conn, $query); //RESULT = ARRAY
        $rows = []; //TEMPAT UNTUK MENAMPUNG ELEMEN ARRAY
        // MENAMPILKAN SELURUH DATA DARI TABEL (ARRAY)
        while( $row = mysqli_fetch_assoc($result) ) {
            $rows[] = $row; //AMBIL DATA KEMUDIAN SIMPAN KE DALAM VAR
        }
        return $rows; //MENGEMBALIKAN DATA
    }

    // function tambah($data) {
    //     // panggil koneksi
    //     global $conn;
    //     // tampung data yg diinput
    //     $nama_file = htmlspecialchars($data["nama_file"]);
    //     $file = htmlspecialchars($data["file"]);

    //     // sintaks insert data
    //     $query = "INSERT INTO download VALUES('', '$tgl', '$nama', '$file_ext', '$file_size', '$lokasi')";
    // }

?>