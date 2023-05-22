<?php
    $DB_HOST = 'localhost';
    $DB_USER = 'root';
    $DB_PASS = '';
    $DB_NAME = 'db_kampus';
    $mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS);

    if($mysqli->connect_error){
        die("Koneksi Gagal: " . $mysqli->connect_error);
    };

    // Membuat DATABASE
    $sql = "CREATE DATABASE IF NOT EXISTS db_kampus";
    if(mysqli_query($mysqli, $sql)){
        echo "<h3>Database Berhasil Dibuat!</h3>";
    } 
    else{
        echo "<h3>Database Gagal Dibuat!</h3>".mysqli_error($mysqli);
    };


    require_once('koneksi.php');
    // Mengkoneksikan Database Yang Berhasil Dibuat!
    mysqli_select_db($mysqli, "db_kampus");

    // Membuat Tabel
    $sql = "CREATE TABLE IF NOT EXISTS data_mahasiswa(
        nim CHAR(10) PRIMARY KEY,
        nama VARCHAR(100),
        jurusan VARCHAR(50),
        prodi VARCHAR(100),
        gender VARCHAR(100),
        tanggal_lahir DATE
    )";

    if (mysqli_query($mysqli, $sql)) {
        echo "<h3>Tabel Berhasil Dibuat!</h3>";
    }
    else{
        echo "<h3>Tabel Gagal Dibuat!</h3>" . mysqli_error($mysqli);
    };


    // Menutup Koneksi Ke MYSQL
    mysqli_close($mysqli);
?>