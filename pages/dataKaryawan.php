<?php 
include "../koneksi.php";

if (isset($_POST['simpan'])) {
    $nama       = $_POST['nama'];
    $nik        = $_POST['nik'];
    $tgllahir   = date('y-m-d',strtotime($_POST['tgllahir']));
    $jk         = $_POST['jk'];
    $tglinput   = date('y-m-d', strtotime($_POST['tglinput']));
    $tmptmcu    = $_POST['tmptmcu'];
    $jabatan    = $_POST['jabatan'];
    $dept       = $_POST['dept'];

    $inputkaryawan = mysqli_query($koneksi, "INSERT INTO karyawan (nik, nama, tgl_lahir, jk, tgl_input, mcu, jabatan, dept) 
    VALUES ('$nik','$nama','$tgllahir','$jk','$tglinput','$tmptmcu','$jabatan','$dept')");

    if ($inputkaryawan) {
        // kembali kehalaman index
        header("location:index.php?pesan=simpan");
    } else {
        header("location:index.php?pesan=gagalsimpan");
    }
}

?>