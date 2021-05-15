<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Hello, world!</title>
    <style>
        .container{
            width: 30%;
            margin-top: 9%;
            box-shadow: 0 3px 20px;
            padding: 20px;
        }
    </style>
  </head>
  <body>
    
    <!-- cek apakah ada yang error -->
    <!-- cek pesan notifikasi -->
    <?php 
    if(isset($_GET['pesan'])){
        if($_GET['pesan'] == "gagal"){
            echo "
                    <script>
                        alert('Login gagal! username dan password salah!');
                    </script>
                ";
        }else if($_GET['pesan'] == "logout"){
            echo "
                    <script>
                        alert('Anda berhasil logout!');
                    </script>
                ";
        }else if($_GET['pesan'] == "belum_login"){
            echo "
                    <script>
                        alert('Anda harus login untuk mengakses halaman admin');
                    </script>
                ";
        }
    }
    ?>

    <div class="container">
        <!-- judul form login -->
        <h2 class="text-center">FORM LOGIN DOSEN</h2>
        <!-- form login -->
        <form action="cek_login_dosen.php" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan Username Anda">
            </div>
            <br>
            <div class="form-group">
                <label for="password">password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password Anda">
            </div>
            <br>
            <button type="submit" class="btn btn-primary btn-secondary" name="login" data-bs-toggle="tooltip" data-bs-placement="top" title="Login">Login</button>
        </form>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->

    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
  </body>
</html>