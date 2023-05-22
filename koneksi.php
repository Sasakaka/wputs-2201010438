<?php
    $DB_HOST = 'localhost';
    $DB_USER = 'root';
    $DB_PASS = '';
    $DB_NAME = 'db_kampus';

    $mysqli = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

    // Start Session
    session_start();

    // Memeriksa Koneksi
    if ($mysqli->connect_error){
        die("Failed to connect to MySQL: " . $mysqli->connect_error);
    }
    ?>