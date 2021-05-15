<?php

    // koneksi database
    $conn = mysqli_connect("localhost", "root", "", "universitas_x");

    // buat function untuk menerima data darai function query
    function query($query) {
        global $conn;
        
        // perintah sql
        $result = mysqli_query($conn, $query); //result === array
        // deklarasi variabel yg diisi dengan array kosong
        $values = [];
        // kemudian lakukan perulangan untuk mengambil elemen2 dari dalam array $result
        while( $value = mysqli_fetch_assoc($result) ) {
            // generate data-data dalam $value ke dalam array kosong
            $values[] = $value;
        }
        // return jika mengembalikan nilai
        return $values;
    }

    // function tambah data
    function tambah($data) {
        // global $conn;
        global $conn;
        // tangkap data yg dikirim melalui method POST
        $kode_matkul = htmlspecialchars($data['kode_matkul']);
        $nama_matkul = htmlspecialchars($data['nama_matkul']);
        $jumlah_sks = htmlspecialchars($data['jumlah_sks']);
        $dosen_pengampu = htmlspecialchars($data['dosen_pengampu']);

        // create sintaks query insert data inside table
        $query = "INSERT INTO mahasiswa_matkul
                VALUES
                ('', '$kode_matkul', '$nama_matkul', '$jumlah_sks', '$dosen_pengampu' )";
        // jika sudah dibuat perintah sql
        // kirimkan data ke server untuk dikelola
        mysqli_query($conn, $query);
        // return jika ada data yg dikembalikan
        return mysqli_affected_rows($conn);

    }

    // buat function hapus()
    // menerima inputan parameter dari hapus($id)
    function hapus($id) {
        global $conn;
        // perintah sql untuk menghapus data
        $query = "DELETE FROM mahasiswa_matkul WHERE id = '$id' ";
        //jalankan query
        mysqli_query($conn, $query);
        // return jika mengembalikan nilai
        return mysqli_affected_rows($conn);
    }

    // buat function ubah 
    function ubah($data) {
        global $conn;
        // tangkap id dengan type hidden
        $id = $data["id"];
        $kode_matkul = htmlspecialchars($data["kode_matkul"]);
        $nama_matkul = htmlspecialchars($data["nama_matkul"]);
        $jumlah_sks = htmlspecialchars($data["jumlah_sks"]);
        $dosen_pengampu = htmlspecialchars($data["dosen_pengampu"]);

        // perintah untuk update data
        $query = "UPDATE mahasiswa_matkul
                    SET 
                    kode_matkul = '$kode_matkul',
                    nama_matkul = '$nama_matkul',
                    jumlah_sks = '$jumlah_sks',
                    dosen_pengampu = '$dosen_pengampu'
                    WHERE id = $id
                ";
        // jalankan query
        mysqli_query($conn, $query);

        // return jika ada nilai yg dikembalikan
        return mysqli_affected_rows($conn);
    }
    
    // function untuk melakukan pencarian data 
    function cari($keyword) {
        $query = "SELECT * FROM mahasiswa_matkul
                    WHERE 
                    nama_matkul LIKE '%$keyword%' 
                ";
        return query($query);
    }
?>