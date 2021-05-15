<?php

    // Menghubungkan ke database
    $conn = mysqli_connect("localhost", "root", "", "universitas_x");

    // menerima parameter dari fungsi query()
    // retrieve data dari database
    function query($query) {
        global $conn;
        // query data kemudian simpan dalam sebuah variable
        $result = mysqli_query($conn, $query); //result = array
        // var_dump($result);
        // die;
        $values = [];
        while( $value = mysqli_fetch_assoc($result) ) {
            $values[] = $value;
        }
        return $values;
    }

    // function untuk menambhkan data mahasiswa
    // menampung data post yang dikirim oleh function tambah()
    function tambah($data) {
        global $conn;
        // GUNAKAN HTML SPECIAL CHARACTER
        $nim = htmlspecialchars($data['nim']);
        $nama = htmlspecialchars($data['nama']);  
        $angkatan = htmlspecialchars($data['angkatan']);
        $program_studi = htmlspecialchars($data['program_studi']);
        $kelas = htmlspecialchars($data['kelas']);

        // QUERY INSERT DATA
        $query = "INSERT INTO mahasiswa_akademis
                VALUES
                ('', '$nim', '$nama', '$angkatan', '$program_studi', '$kelas', '', '')";
        
        // MENGIRIMKAN PERINTAH KE server mySql
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    // function untuk menghapus data mahasiswa
    // terima parameter id dari hapus.php
    function hapus($id) {
        // mengakses variable dari luar function
        global $conn;

        // set sintaks untuk menghapus
        $query = mysqli_query($conn, "DELETE FROM mahasiswa_akademis WHERE id = '$id'");
        // perikasa apakah data berhasil ditambahkan
        return mysqli_affected_rows($conn);
    }

    // function untuk menerima parameter id yang dikirim dari ubah.php
    // func MENERIMA INPUTAN DATA misal prameter = $data 
    function ubah($data) {
        global $conn;
        // menampung data post yang dikirim oleh function ubah()
        // ambil data dari tiap elemen form 
        // kemudian simpan dalam variabel 
        $id = $data["id"];
        $nim = htmlspecialchars($data["nim"]);
        $nama = htmlspecialchars($data["nama"]);
        $angkatan = htmlspecialchars($data["angkatan"]);
        $program_studi = htmlspecialchars($data["program_studi"]);
        $kelas = htmlspecialchars($data["kelas"]);

        // set query 
        $query = "UPDATE mahasiswa_akademis
                SET 
                nim = '$nim',
                nama = '$nama',
                angkatan = '$angkatan',
                program_studi = '$program_studi',
                kelas = '$kelas'
                WHERE id = $id
        ";

        // jalankan query
        mysqli_query($conn, $query);

        // kembalikan berapa data yang dikembalikan
        return mysqli_affected_rows($conn);
    }

    // function untuk melakukan pencarian data 
    function cari($keyword) {
        $query = "SELECT * FROM mahasiswa_akademis
                    WHERE 
                    program_studi LIKE '%$keyword%' 
                ";
        return query($query);
    }

    // // function untuk mengupload data
    // function upload() {
    //     // ambil data
    //     $namaFile = $_FILES['file']['name'];
    //     $ukuranFile = $_FILES['file']['size'];
    //     $error = $_FILES['file']['error'];
    //     $tmpName = $_FILES['file']['tmp_name'];

    //     // cek apakah tidak ada file yang di upload
    //     if($error === 4 ) {
    //         echo "
    //             <script>
    //                 alert('Belum ada File/Gambar yang dipilih');
    //             </script>
    //         ";
    //         return false;
    //     }

    //     // periksa apakah file yang diupload adalah gambar atau file
    //     $ekstensiFile = ['jpg', 'jpeg', 'png', 'pdf', 'docx'];
    //     // onai.jpg = ['onai', 'jpg'];
    //     $ekstensiFile = explode('.', $namaFile);
    //     $ekstensiFile = strtolower(end($ekstensiFile));

    //     if(!in_array($ekstensiFile, $ekstensiFileValid) ) {
    //         echo "
    //             <script>
    //                 alert('Moho upload file sesuai dengan ketentuan');
    //             </script>
    //         ";
    //         return false;
    //     }

    //     // jika lolos pengecekan, kemudian upload gambar
    //     // generate nama gambar terlebih dahulu
    //     $namaFileBaru = uniqid();
    //     $namaFileBaru .= '.';
    //     $namaFileBaru .= $ekstensiFile;
    //     move_uploaded_file($tmpName, 'file/'.$namaFileBaru);
    //     return $namaFileBaru;
    // }


?>