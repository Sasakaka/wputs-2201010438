<?php
    define("DBHOST", "localhost");
    define("DBUSER", "root");
    define("DBPASS", "");
    define("DBNAME", "db_kampus");

    $cnn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME) or die("Koneksi ke DBMS Mysql gagal");
    if($cnn){
        echo "Koneksi ke DBMS Mysql Sukses";
    }else{
        echo "Koneksi ke DBMS Mysql gagal";
    }
    mysqli_close($cnn);