<?php
include "conn.php";

$pass = md5($_POST['password']);
$username = mysqli_escape_string($koneksi, $_POST['username']);
$password = mysqli_escape_string($koneksi, $pass);
$level = mysqli_escape_string($koneksi, $_POST['level']);

$cek_user = mysqli_query($koneksi, "SELECT * FROM tuser WHERE username = '$username' and level= '$level' ");
$user_valid = mysqli_fetch_array($cek_user);

if($user_valid){
    if($password == $user_valid['password']){
        session_start();
        $_SESSION['username'] = $user_valid['username'];
        $_SESSION['level'] = $user_valid['level'];

        if($level == "Admin") {
            header('location:dashboard_admin.php');
        }else {
            header('location:dashboard_user.html');
        }
    }else {
        echo "<script>alert('Maaf login Gagal, silahkan masukan password dengan benar!');
        document.location='index.php'</script>";}
}else {
    echo "<script>alert('Maaf login Gagal, silahkan masukan username dengan benar!');
    document.location='index.php'</script>";
}
?>