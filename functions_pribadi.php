<?php
    // koneksi ke database universitas_x
    $conn = mysqli_connect("localhost", "root", "", "universitas_x");

    // function untuk retrieving data fro database
    function query($query) {
        // panggil var global
        global $conn;
        // gunakan sintaks sql sebelumnya untuk mengambil data
        $result = mysqli_query($conn, $query); //result == array
        // deklarasikan var array untuk menyimpan elemen dari $result
        $values = [];
        while( $value = mysqli_fetch_assoc($result) ) {
            // isi elemen dari dalam array ke dalam var array
            $values[] = $value;
        }
        // kembalikan valunya
        return $values;
    }

    // functions untuk menambahkan data pribadi Mahasiswa
    // menampung data post yang dikirim oleh function tambah()
    // $data = function tambah($_POST) > 0
    function tambah($data) {
        global $conn;
        // gunakan html special chracters, untuk menampung data
        $nama = htmlspecialchars($data['nama']);
        $ttl = htmlspecialchars($data['ttl']);
        $alamat = htmlspecialchars($data['alamat']);
        $agama = htmlspecialchars($data['agama']);
        $golongan_darah = htmlspecialchars($data['golongan_darah']);
        $jalur_masuk = htmlspecialchars($data['jalur_masuk']);

        // gunakan sintaks sql untuk menambahkan data ke database
        $query = "INSERT INTO mahasiswa_pribadi
                VALUES
                ('', '$nama', '$ttl', '$alamat', '$agama', '$golongan_darah', '$jalur_masuk')
                ";
        
        // kirimkan perintah ke server sql
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

 
    // functions untuk menghapus data mahasiswa
    // terima parameter id dari function hapus($id)
    function hapus($id) {
        // akses variabel $conn
        global $conn;

        // set sintaks menghapus data
        $query = mysqli_query($conn, "DELETE FROM mahasiswa_pribadi WHERE id = '$id' ");
        // return jika ada nilai yang dikembalikan
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
        $nama = htmlspecialchars($data["nama"]);
        $ttl = htmlspecialchars($data["ttl"]);
        $alamat = htmlspecialchars($data["alamat"]);
        $agama = htmlspecialchars($data["agama"]);
        $golongan_darah = htmlspecialchars($data["golongan_darah"]);
        $jalur_masuk = htmlspecialchars($data["jalur_masuk"]);

        // set query 
        $query = "UPDATE mahasiswa_pribadi
                SET 
                nama = '$nama',
                ttl = '$ttl',
                alamat = '$alamat',
                agama = '$agama',
                golongan_darah = '$golongan_darah',
                jalur_masuk = '$jalur_masuk'
                WHERE id = $id
        ";

        // jalankan query
        mysqli_query($conn, $query);

        // kembalikan berapa data yang dikembalikan
        return mysqli_affected_rows($conn);
    }

    // function untuk melakukan pencarian data 
    function cari($keyword) {
        $query = "SELECT * FROM mahasiswa_pribadi
                    WHERE 
                    nama LIKE '%$keyword%' 
                ";
        return query($query);
    }
    
?>