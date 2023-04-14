<?php 
include "koneksi.php";

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // panggil database login
    $ceklogin = mysqli_query($koneksi,"SELECT * FROM login WHERE username='$username' AND password='$password'");

    // cek/hitung jumlah data yang masuk atau login jika bernilai 1 maka login, jika bernilai 0 makatidak bisa login
    $hitung = mysqli_fetch_array($ceklogin);
    if ($hitung > 0) {
        
        // panggil session agar bisa membuat log akses
        $_SESSION['log']    = 'True';
        // Session berikut sebagai menampilkan nama user login
        $_SESSION['username'] = $username;

        // di alihkan aksesnya ke index.php atau tetap di login.php jika gagal
        header("location:pages/index.php?status=berhasillogin");
    } else {
        header("location:login.php?status=gagallogin");
    }
}
?>