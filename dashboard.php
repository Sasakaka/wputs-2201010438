<?php 
    require_once('koneksi.php');

    // Allert
    if(isset($_SESSION['alert']) && $_SESSION['alert'] == 'hapus') {
        echo "<div></div>";
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js'></script><link href='https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css' rel='stylesheet'><script>Swal.fire('Delete!','Data Berhasil Di Delete!','info')</script>";    
    }

    if(isset($_SESSION['alert']) && $_SESSION['alert'] == 'update') {
        echo "<div></div>";
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js'></script><link href='https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css' rel='stylesheet'><script>Swal.fire('Update!','Data Berhasil Di Update!','success')</script>";
    }

    if(isset($_SESSION['alert']) && $_SESSION['alert'] == 'tambah') {
        echo "<div></div>";
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js'></script><link href='https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css' rel='stylesheet'><script>Swal.fire('Tambah Data!','Data Mahasiswa Berhasil Di Tambahkan!','success')</script>";
    }

    // Read Data
    function read_data()
    {
        global $mysqli;

        $query = "SELECT * FROM data_mahasiswa";
        $result = mysqli_query($mysqli, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $data = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
            return $data;
        } else {
            return array();
        }
    }

    $data_tabel = read_data();

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
        <div class="main-table shadow p-3 mb-5 bg-body-tertiary rounded">
            <table class="table table-light">
                <thead>
                    <tr>
                    <th scope="col">NIM</th>
                    <th scope="col">Nama Mahasiswa</th>
                    <th scope="col">Jurusan</th>
                    <th scope="col">Prodi</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">
                        <a href="tambah.php" class="btn btn-success">Tambah</a>
                    </th>
                    </tr>
                </thead>
                <tbody class="table-group-divider tx-dark">
                    <?php
                    for ($i = 0; $i < count($data_tabel); $i++) {
                    ?>
                        <tr>
                            <th scope="col"><?php echo $data_tabel[$i]['nim'] ?></th>
                            <th scope="col"><?php echo $data_tabel[$i]['nama'] ?></th>
                            <th scope="col"><?php echo $data_tabel[$i]['jurusan'] ?></th>
                            <th scope="col"><?php echo $data_tabel[$i]['prodi'] ?></th>
                            <th scope="col"><?php echo $data_tabel[$i]['gender'] ?></th>
                            <th scope="col"><?php echo $data_tabel[$i]['tanggal_lahir'] ?></th>
                            <th scope="col">
                                <a href="ubah.php" class="btn btn-primary">Update</a>
                                <a href="hapus.php" class="btn btn-danger">Delete</a>
                                
                            </th>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    
    <footer>

    </footer>
</body>
</html>

<?php 
    $_SESSION['alert'] = ' '; 
?>