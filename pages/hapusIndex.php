<?php 
include "../koneksi.php";

if (isset($_POST['hapusdata'])) {
    $idk    = $POST['idk'];

    $hapus  = mysqli_query($koneksi, "DELETE FROM karyawan WHERE idkaryawan='$idk'");

    if ($hapus) {
        
        // kembali kehalaman
        header("location:index.php?pesan=hapusdata");
    } else {
        header("location:index.php?pesan=gagalhapus");
    }
}
?>