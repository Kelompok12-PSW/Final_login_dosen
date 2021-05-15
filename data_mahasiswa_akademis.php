<?php
    session_start();
    if($_SESSION["status"] != "login") {
        header("Location: ../index.php?pesan=belum_login");
    }
    // memanggil file functions.php
    require "functions.php";

    // Sintaks query untuk mengambil data dari database
    $mahasiswa = query("SELECT * FROM mahasiswa_akademis");

    // periksa apakah tombol dengan name cari sudah ditekan 
   if(isset($_POST["cari"]) ) {
        $mahasiswa = cari($_POST["keyword"]);
    }
?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="style.css" rel="stylesheet">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<style>
  body {font-family: Arial, Helvetica, sans-serif;}

  .navbar {
    width: 100%;
    background-color: rgba(227, 241, 18, 0.938);
    overflow: none;
  }

  .navbar a {
    float: left;
    padding: 12px;
    color: rgb(17, 16, 16);
    text-decoration: none;
    font-size: 17px;
  }

  .navbar a:hover {
    background-color: rgb(31, 128, 219);
  }

  .active {
    background-color: #e5e912;
  }

  .dropdown {
    background-color: rgb(17, 16, 16);
  }

  </style>
</head>

<body>
<!-- AWAL CONTAINER -->
<div class="container">
    <div class="navbar">
    <a class="active" href="#"><i class="fa fa-fw fa-university"></i> E-campus </a> 
    <a href="home.php"><i class="fa fa-fw fa-home"></i> Home</a> 
    <a href="modul.php"><i class="fa fa-fw fa-book"></i> Modul</a> 
    <!-- <a href="data_mahasiswa_akademis.php"><i class="fa fa-fw fa-graduation-cap"></i> Data Mahasiswa</a> -->
    <div class="dropdown">
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-fw fa-graduation-cap"></i>
            Data Mahasiswa
        </a>

        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="data_mahasiswa_akademis.php">Data Akademis</a>
            <a class="dropdown-item" href="data_mahasiswa_pribadi.php">Data Pribadi</a>
        </div>
    </div>
    <!-- <a href="#"><i class="fa fa-fw fa-user"></i> Data Akademik</a>  -->
    <div class="dropdown">
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-fw fa-user"></i>
            Data Akademik
        </a>

        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="data_mahasiswa_prodi.php">Data Prodi</a>
            <a class="dropdown-item" href="data_mahasiswa_matkul.php">Data Mata Kuliah</a>
        </div>
    </div>
    <a href="logout.php"><i class="fa fa-fw fa-sign-out"></i> Logout</a>
    </div>

    <hr />

    <!-- LAYOUT HALAMAN DATA AKADEMIS -->
    <div class="row">
        <div class="mt-5">
            <h1 class="text-left">DATA AKADEMIS</h1><hr>
        </div>
    </div>
        
    <div class="row">
        <div class="col-md-6">
            <!-- SEARCHING DATA DARI DATABASE -->
            <form action="" method="POST">
            <label for="keyword">Prodi</label>
                <input type="text" name="keyword" id="keyword" size="20" autofocus=""
                placeholder="masukkan keyword prodi.." 
                autocomplete="off">
                <button type="submit" name="cari">CARI!</button>
            </form>
        </div>
    </div>
    
    <br>

    <!-- button menambahkan data mahasiswa -->
    <div class="float-sm-right">
        <button type='button' class="btn btn-outline-warning"><a href="tambah_data_mahasiswa.php" data-bs-toggle="tooltip" data-bs-placement="top" title="Tambahkan data mahasiswa">Tambahkan Data</a></button>
    </div>
    <br>
    <br>

    <!-- layout website -->
    <table border="5" cellpadding="0" cellspacing="0" class="table">
        <thead class="table-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">NIM</th>
                <th scope="col">Nama</th>
                <th scope="col">Angkatan</th>
                <th scope="col">Program Studi</th>
                <th scope="col">Kelas</th>
                <th scope="col">Action</th>
            </tr>
        </thead>

        <?php $id = 1; ?>
        <?php foreach( $mahasiswa as $mhs) : ?>

        <tbody>
            <tr>
                <td><?= $id; ?></td>
                <td><?= $mhs["nim"]; ?></td>
                <td><?= $mhs["nama"]; ?></td>
                <td><?= $mhs["angkatan"]; ?></td>
                <td><?= $mhs["program_studi"]; ?></td>
                <td><?= $mhs["kelas"]; ?></td>
                <td>
                    <button typr="submit" class="btn btn-outline-success" name="bsimpan"><a href="ubah_data_mahasiswa.php?id=<?= $mhs['id']; ?>" onclick="return confirm('Yakin Mengubah Data?')" data-bs-toggle="tooltip" data-bs-placement="top" title="Perbaharui Data">Edit</a></button>
                    <button typr="reset" class="btn btn-danger" name="breset"><a href="hapus_data_mahasiswa.php?id=<?= $mhs['id']; ?>" onclick="return confirm('Yakin Menghapus Data?')" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus Data">Hapus</a> </button>

                </td>
            </tr>
        </tbody>
        <?php $id++; ?>
        <?php endforeach; ?>

    </table>

<!-- END CONTAINER -->
</div>
  
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Link JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>

</body>
</html>