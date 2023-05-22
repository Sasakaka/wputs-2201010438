<?php
    require_once('koneksi.php');

    // Delete Data
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id = $_POST['nim'];
        $nama = $_POST['nama'];
        $prodi = $_POST['prodi'];
        $gender = $_POST['gender'];
        $jurusan = $_POST['jurusan'];
        $tanggal_lahir = $_POST['tanggal_lahir'];

        $query = "DELETE FROM data_mahasiswa WHERE nim = '$id'";

            if(mysqli_query($mysqli, $query)) {
                $_SESSION['alert'] = 'hapus';
                header("Location: dashboard.php");
                exit;
            }
            else{
            echo "Error deleting record: " . mysqli_error($conn);
            }
    }

    // // Sisteam Read Data
    $nim = mysqli_real_escape_string($mysqli, $_GET['id']);
    $sql = "SELECT * FROM data_mahasiswa WHERE nim = '$nim'";

    $result = mysqli_query($mysqli, $sql);

    // Cek Data
    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
    }
    else {
        echo "Data tidak ditemukan.";
        $data = [];
    }

    mysqli_close($mysqli);
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
        <form action="delete.php?id=<?= $data['nim']; ?>"" method="POST" class="shadow p-3 mb-5 bg-body-tertiary rounded">
            <div class="mb-3 col-6 ">
                <label class="form-label" for="nim">NIM</label>
                <input type="number" class="form-control" id="nim" name="nim" value="<?= $data['nim'] ?>">
            </div>
            <div class="mb-3 col-6">
                <label class="form-label" for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['nama'] ?>">
            </div>
            <div class="mb-3 col-6">
                <label class="form-label" for="jurusan">Jurusan</label>
                <select name="jurusan" id="jurusan" class="form-select">
                    <option selected disabled hidden></option>
                    <option value="TI-MTI" <?php if ($data['jurusan'] == 'TI-MTI') { echo 'selected'; } ?>>TI-MTI</option>
                    <option value="TI-KAB" <?php if ($data['jurusan'] == 'TI-KAB') { echo 'selected'; } ?>>TI-KAB</option>
                    <option value="Sistem Komputer" <?php if ($data['jurusan'] == 'Sistem Komputer') { echo 'selected'; } ?>>Sistem Komputer</option>
                    <option value="Bisnis Digital" <?php if ($data['jurusan'] == 'Bisnis Digital') { echo 'selected'; } ?>>Bisnis Digital</option>
                    <option value="DKV" <?php if ($data['jurusan'] == 'DKV') { echo 'selected'; } ?>>DKV</option>
                </select>
            </div>
            <div class="mb-3 col-6">
                <label for="prodi" class="form-label">Prodi</label>
                <select name="prodi" id="prodi" class="form-select">
                    <option selected disabled hidden></option>
                    <option value="TI" <?php if ($data['prodi'] == 'TI') { echo 'selected'; } ?>>TI</option>
                    <option value="SK" <?php if ($data['prodi'] == 'SK') { echo 'selected'; } ?>>SK</option>
                    <option value="DKV" <?php if ($data['prodi'] == 'DKV') { echo 'selected'; } ?>>DKV</option>
                </select>
            </div>
            <div class="mb-3 col-6">
                <label for="gender" class="form-label">Jenis Kelamin</label>
                <select name="gender" id="gender" class="form-select">
                    <option selected disabled hidden></option>
                    <option value="Laki-Laki" <?php if ($data['gender'] == 'Laki-Laki') { echo 'selected'; } ?>>Laki-Laki</option>
                    <option value="Perempuan" <?php if ($data['gender'] == 'Perempuan') { echo 'selected'; } ?>>Perempuan</option>
                </select>
            </div>
            <div class="mb-3 col-6">
                <label for="tanggal_lahir" class="form-label" value="<?= $data['tanggal_lahir']?>">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
            </div>
            <button type="submit" class="btn btn-danger">Delete</button>
            <a href="dashboard.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
    
    <footer>

    </footer>
</body>
</html>