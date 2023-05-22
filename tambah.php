<?php
    require('koneksi.php');

    // Tambah Data
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $jurusan = $_POST['jurusan'];
        $prodi = $_POST['prodi'];
        $gender = $_POST['gender'];
        $tanggal_lahir = $_POST['tanggal_lahir'];

        //Menambah Data Baru
        $query = "INSERT INTO data_mahasiswa(
                nim, 
                nama, 
                jurusan, 
                prodi, 
                gender, 
                tanggal_lahir
                )
                VALUES(
                '$nim', 
                '$nama', 
                '$jurusan', 
                '$prodi', 
                '$gender', 
                '$tanggal_lahir'
                )";

                if(mysqli_query($mysqli, $query)) {
                    $_SESSION['alert'] = 'tambah';

                    header("Location: dashboard.php");
                    exit;
                }
                else{
                echo "Error create data record: " . mysqli_error($conn);
                }

        mysqli_close($mysqli);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    <title>Data Mahasiswa</title>
</head>
<body>
    <!-- Navbar -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Dashboard ┃ Data Mahasiswa</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Daftar/Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- Close Navbar -->

    <!-- Content -->
    <div class="container">
        <div class="row my-3">
            <div class="col-md">
                <h2 class="text-upprtcase text-center fw-bold">Data Mahasiswa</h2>
            </div>
        </div>
        <hr>

    <div class="add">
        <form action="tambah.php" method="POST" class="shadow p-3 mb-5 bg-body-tertiary rounded">
            <div class="mb-3 col-6 ">
                <label class="form-label" for="nim">NIM</label>
                <input type="number" class="form-control" id="nim" name="nim">
            </div>
            <div class="mb-3 col-6">
                <label class="form-label" for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama">
            </div>
            <div class="mb-3 col-6">
                <label class="form-label" for="jurusan">Jurusan</label>
                <select name="jurusan" id="jurusan" class="form-select">
                    <option selected disabled hidden></option>
                    <option value="TI-MTI">TI-MTI</option>
                    <option value="TI-KAB">TI-KAB</option>
                    <option value="Sistem Komputer">Sistem Komputer</option>
                    <option value="Bisnis Digital">Bisnis Digital</option>
                    <option value="DKV">DKV</option>
                </select>
            </div>
            <div class="mb-3 col-6">
                <label for="prodi" class="form-label">Prodi</label>
                <select name="prodi" id="prodi" class="form-select">
                    <option selected disabled hidden></option>
                    <option value="TI">TI</option>
                    <option value="SK">SK</option>
                    <option value="DKV">DKV</option>
                </select>
            </div>
            <div class="mb-3 col-6">
                <label for="gender" class="form-label">Jenis Kelamin</label>
                <select name="gender" id="gender" class="form-select">
                    <option selected disabled hidden></option>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="mb-3 col-6">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
            </div>
            <button type="submit" class="btn btn-dark">Submit</button>
        </form>
    </div>
    
    <footer>









    </footer>

</body>
</html>

