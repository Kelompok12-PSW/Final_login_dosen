<?php
    // menghubungkan file functions
    require "functions.php";

    $conn =  mysqli_connect("localhost", "root", "", "universitas_x");

    if( isset($_POST['submit']) ) {
        // cek apakah data berhasil ditambahkan
        // data dari elemen form diambil
        // dimasukkan ke dalam tambah() 
        if( tambah($_POST) > 0 ) {
            echo "
                <script>
                    alert('data berhasil ditambahkan!');
                    document.location.href = 'data_mahasiswa_akademis.php';
                </script>
            ";
            
        }
        else {
            echo "
                <script>
                    alert('data gagal ditambahkan!');
                    // document.location.href = 'data_mahasiswa_akademis.php';
                </script>
            ";
            // echo mysqli_error($conn);
            // die;
        }
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tambah Data</title>

    <!-- link style css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>
<body>
    
    <div class="container">
        <div class="mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Tambah Data Mahasiswa</h1>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="mt-5">
            <div class="col-md-10">
                <div class="card shadow-lg border-0">
                    <div class="card-body">
                        <h3>Form Tambah Data Mahasiwa</h3><hr>
                        <form action="" method="POST">
                            <div class="form-group">
                                <!-- form untuk input data -->
                                <label for="nama">Nama Mahasiswa</label>
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Input nama ">
                                <br>
                                <label for="nim">NIM Mahasiswa</label>
                                <input type="text" class="form-control" name="nim" id="nim" placeholder="Input nim ">
                                <br>
                                <label for="angkatan">Angkatan</label>
                                <input type="text" class="form-control" name="angkatan" id="angkatan" placeholder="Input angkatan ">
                                <br>
                                <label for="program_studi">Program Studi</label>
                                <input type="text" class="form-control" name="program_studi" id="program_studi" placeholder="Input program studi ">
                                <br>
                                <label for="kelas">Kelas</label>
                                <input type="text" class="form-control" name="kelas" id="kelas" placeholder="Input kelas ">
                            </div>
                            <br>
                            
                            <div class="form-group">
                                <div class="float-sm-end">
                                <button type="submit" class="btn btn-primary btn-block" name="submit">Tambahkan Data Mahasiswa</button>
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

    <!-- <div class="container">
    <form action="" method="POST">
    <ul>
            <li>
                <label for="nim">NIM :</label>
                <input type="text" name="nim" id="nim" required>
            </li>
        </ul>
        <ul>
            <li>
                <label for="nama">Nama Mahasiswa :</label>
                <input type="text" name="nama" id="nama" required>
            </li>
        </ul>
        
        <ul>
            <li>
                <label for="angkatan">Angkatan :</label>
                <input type="text" name="angkatan" id="angkatan" required>
            </li>
        </ul>
        <ul>
            <li>
                <label for="program_studi">Program Studi :</label>
                <input type="text" name="program_studi" id="program_studi" required>
            </li>
        </ul>
        <ul>
            <li>
                <label for="kelas">Kelas :</label>
                <input type="text" name="kelas" id="kelas" required>
            </li>
            <li>
                <button type="submit" name="submit">Tambah Data </button>
            </li>
        </ul>
    </form>
    </div> -->
    

</body>
</html>