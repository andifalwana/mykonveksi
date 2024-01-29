<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "db_konveksi";

$koneksi = mysqli_connect($server, $user, $password, $database) or die ("gagal konek" .mysqli_error($koneksi));
?>