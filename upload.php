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
                <h1 class="text-center">Form Menambahkan Modul Pelajaran</h1>
                <hr>
            </div>
        </div>

        <!-- Logic php -->
        <?php
            include "functions_upload.php";
            if ( isset($_POST["upload"] ) ) {
                // periksa ekstensi apa saja yg boleh diupload
                $allowed_ext = array('doc', 'docx', 'xls', 'xlxs', 'ppt', 'pptx', 'pdf', 'rar', 'zip', 'jpeg', 'jpg', 'png');
                // nama file
                $file_name = $_FILES['file']['name'];
                $file_ext = explode('.', $file_name);
                $file_ext = strtolower(end($file_ext));
                $file_size = $_FILES['file']['size'];
                $file_tmp = $_FILES['file']['tmp_name'];


                $nama = $_POST['nama_file'];
                $tgl = date("Y-m-d");

                if( in_array($file_ext, $allowed_ext) === true) {
                    // periksa apakah ukuran file tidak melebihi
                    // 1mb = 1044070
                    // 1mb = 1.000.000bytes
                    if($file_size < 10000000) {
                        // tempat penyimpanan file
                        $lokasi = '../login_mahasiswa/file/'.$nama.'.'.$file_ext;
                        // upload file 
                        move_uploaded_file($file_tmp, $lokasi);
                        $query = "INSERT INTO tbl_upload VALUES('', '$tgl', '$nama', '$file_ext', '$file_size', '$lokasi')";
                        $in = mysqli_query($conn, $query);
                        // cek apakah query berhasil dijalankan
                        if( $in) {
                            echo "
                                <script>
                                    alert('Data BERHASIL diupload');
                                    document.location.href = 'modul.php';
                                </script>
                            ";
                        }else {
                            echo "
                                <script>
                                    alert('Data BERHASIL diupload');
                                    document.location.href = 'modul.php';
                                </script>
                            ";
                        }
                    }else {
                        echo "
                            <script>
                                alert('Besar ukuran file (file size) maksimal 1 Mb!');
                                document.location.href = 'modul.php';
                            </script>
                        ";
                    }
                }else {
                    echo "
                        <script>
                            alert('Ekstensi file tidak diizinkan');
                            document.location.href = 'modul.php';
                        </script>
                    ";
                }
            }
        ?>

        <div class="row">
            <div class="mt-5">
            <div class="col-md-10">
                <div class="card shadow-lg border-0">
                    <div class="card-body">
                        <h3>Form menambahkan modul</h3><hr>
                        <!-- file dikelola denga $_FILES dengan atribut enctype -->
                        <!-- supaya filenya dapat diambil -->
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <!-- form untuk input data -->
                                <div>
                                    <label for="nama_file">Nama file</label>
                                    <input type="text" class="form-control" name="nama_file" id="nama_file" autocomplete="0" placeholder="Input nama modul pelajaran ">
                                </div>
                                <div>
                                    <label for="file">Pilih file yang ingin ditambahkan : </label><br>
                                    <input type="file" class="form-control" name="file" id="file" placeholder="Input modul pelajaran ">
                                </div>
                                <br>
                            </div>
                            <br>
                            
                            <div class="form-group">
                                <div class="float-sm-end">
                                <button type="submit" class="btn btn-primary btn-block" name="upload">Tambahkan Modul Pelajaran</button>
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