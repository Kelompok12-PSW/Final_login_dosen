<?php
    // menghubungkan file functions
    require "functions_matkul.php";

    // tangkap data yg telah dikirim dari url melalui method GET
    $id = $_GET["id"]; //id untuk mendapatkan data mahasiswa

    // QUERY DATA MAHASISWA BERDASARKAN ID
    // HASIL DARI FUNCTION QUERY = ARRAY NUMERIC
    // REFER KE VALUE TIAP ELEMEN FORM
    $mhs = query("SELECT * FROM mahasiswa_matkul WHERE id = $id ")[0];
    // var_dump($mhs["nim"]);
    // die;

    if( isset($_POST['submit']) ) {
        // cek apakah data berhasil ditambahkan
        // data dari elemen form diambil
        // dimasukkan ke dalam tambah() 
        if( ubah($_POST) > 0 ) {
            echo "
                <script>
                    alert('data BERHASIL Diubah!');
                    document.location.href = 'data_mahasiswa_matkul.php';
                </script>
            ";
            
        }
        else {
            echo "
                <script>
                    alert('data GAGAL Diubah!');
                    // document.location.href = 'data_mahasiswa_matkul.php';
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
    <title>Ubah Data Mata Kuliah</title>

    <!-- link style css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>
<body>
    
    <div class="container">
        <div class="mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Ubah Data Mata Kuliah</h1>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="mt-5">
            <div class="col-md-10">
                <div class="card shadow-lg border-0">
                    <div class="card-body">
                        <h3>Form Ubah Data Mata Kuliah</h3><hr>
                        <form action="" method="POST">
                            <div class="form-group">
                                <!-- form untuk input data -->
                                <!-- SET ID UNTUK MENGIRIM DATA ID SEBAGAI IDENTIFIER UNTUK UPDATE-->
                                <input type="hidden" name="id" value="<?= $mhs['id']; ?>">

                                <label for="kode_matkul">Kode Mata Kuliah</label>
                                <input type="text" class="form-control" name="kode_matkul" id="kode_matkul" placeholder="Input kode matkul" value="<?= $mhs['kode_matkul']; ?>">
                                <br>
                                <label for="nama_matkul">Nama matkul</label>
                                <input type="text" class="form-control" name="nama_matkul" id="nama_matkul" placeholder="Input nama matkul" value="<?= $mhs['nama_matkul']; ?>">
                                <br>
                                <label for="jumlah_sks">Jumlah Sks</label>
                                <input type="text" class="form-control" name="jumlah_sks" id="jumlah_sks" placeholder="Input jumlah_sks" value="<?= $mhs['jumlah_sks']; ?>">                                
                                <br>
                                <label for="dosen_pengampu">Dosen Pengampu</label>
                                <input type="text" class="form-control" name="dosen_pengampu" id="dosen_pengampu" placeholder="Input dosen_pengampu ">
                            </div>
                            <br>
                            
                            <div class="form-group">
                                <div class="float-sm-end">
                                <button type="submit" class="btn btn-primary btn-block" name="submit">Ubah Data Mata Kuliah</button>
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
</html>