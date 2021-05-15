<?php
    require 'functions.php';
    // KONEKSI DATABASE (DISIMPAN KE DALAM SEBUAH VARIABLE)
    // $conn =  mysqli_connect("localhost", "root", "", "unversitas_x");

    // AMBIL DATA YG DI URL
    $id = $_GET['id']; //id untuk mendapatkan data mahasiswa

    // QUERY DATA MAHASISWA BERDASARKAN ID
    // HASIL DARI FUNCTION QUERY = ARRAY NUMERIC
    // REFER KE VALUE TIAP ELEMEN FORM
    $mhs = query("SELECT * FROM mahasiswa_akademis WHERE id = $id ")[0];
    // var_dump($mhs["nim"]);
    // die;

    // CEK APAKAH TOMBOL SUBMIT SUDAH DI TEKAN
    if( isset($_POST['submit']) ) {
        // CEK APAKAH DATA BERHASIL ATAU GAGAL DIUBAH
        //fungsi ubah dengan mengirimkan argumen $_POST
        if( ubah($_POST) > 0 ) {
            echo "
                <script>
                    alert('data berhasil diubah!');
                    document.location.href = 'data_mahasiswa_akademis.php';
                </script>
            ";
        }
        else {
            echo "
            <script>
                alert('data gagal diubah!');
                document.location.href = 'data_mahasiswa_akademis.php';
            </script>
            ";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ubah Data</title>

    <!-- link style css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>
<body>
    
    <div class="container">
        <div class="mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Ubah Data Mahasiswa</h1>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="mt-5">
            <div class="col-md-10">
                <div class="card shadow-lg border-0">
                    <div class="card-body">
                        <h3>Form Ubah Data Mahasiwa</h3><hr>
                        <form action="" method="POST">
                            <div class="form-group">
                                <!-- form untuk input data -->

                                <!-- SET ID UNTUK MENGIRIM DATA ID SEBAGAI IDENTIFIER UNTUK UPDATE-->
                                <input type="hidden" name="id" value="<?= $mhs['id']; ?>">

                                <label for="nim">NIM Mahasiswa</label>
                                <input type="text" class="form-control" name="nim" id="nim" value="<?= $mhs['nim']; ?>">
                                <br>
                                <label for="nama">Nama Mahasiswa</label>
                                <input type="text" class="form-control" name="nama" id="nama" value="<?= $mhs['nama']; ?>">
                                <br>
                                <label for="angkatan">Angkatan</label>
                                <input type="text" class="form-control" name="angkatan" id="angkatan" value="<?= $mhs['angkatan']; ?>">
                                <br>
                                <label for="program_studi">Program Studi</label>
                                <input type="text" class="form-control" name="program_studi" id="program_studi" value="<?= $mhs['program_studi']; ?>">
                                <br>
                                <label for="kelas">Kelas</label>
                                <input type="text" class="form-control" name="kelas" id="kelas" value="<?= $mhs['kelas']; ?>">
                            </div>
                            <br>
                            
                            <div class="form-group">
                                <div class="float-sm-end">
                                <button type="submit" class="btn btn-primary btn-block" name="submit">Perbaharui Data Mahasiswa</button>
                                </div>
                            </div>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </div>
</body>
</html