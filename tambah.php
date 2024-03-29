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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
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
                            <a class="nav-link" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
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
                <h2 class="text-upprtcase text-center fw-bold">Tambah Data</h2>
            </div>
        </div>
        <hr>
    </div>
    <div class="add">
        <form action="tambah.php" method="POST" class="shadow p-3 mb-5 bg-body-tertiary rounded" style="margin:auto;display:flex;flex-direction:column; justify-content:center;align-items:center">
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
            <button type="submit" class="btn btn-dark">Tambah</button>
        </form>
    </div>
    
    <footer class="footer-test text-bg-dark">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12 text-center">
                    <p class="menu text-uppercase py-5 mb-2">
                        <a href="#" class="text-decoration-none text-dark-emphasis m-2">Home</a>
                        <a href="#" class="text-decoration-none text-dark-emphasis m-2">Dashboard</a>
                        <a href="#" class="text-decoration-none text-dark-emphasis m-2">About</a>
                        <a href="#" class="text-decoration-none text-dark-emphasis m-2">Contact</a>
                    </p>
                </div>
                <div class="col-md-12 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#71717a" class="bi bi-facebook m-2" viewBox="0 0 16 16">
                        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#71717a" class="bi bi-instagram m-2" viewBox="0 0 16 16">
                        <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#71717a" class="bi bi-twitter m-2" viewBox="0 0 16 16">
                        <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                    </svg>
                </div>
                <div class="col-md-12 text-center my-4">
                    <p class="note text-dark-emphasis mt-2">Copyright ©2023 All rights reserved🖤</p>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>

