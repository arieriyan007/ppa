<?php 

// session
session_start();

// membuat koneksi ke database
$koneksi = mysqli_connect("localhost","root","","mcu1");

// membuat notifikasi if jika terjadi gagal terhubung ke database
if (mysqli_connect_errno()) {
    echo "<div class='alert alert-danger' role='alert'><strong> gagal terhubung dengan database</strong></div>";
}
?>