<?php 
include "../koneksi.php";

if (isset($_POST['updatedata'])) {
    $idk        = $_POST['idk'];
    $nama       = $_POST['nama'];
    $tgllahir   = date('y-m-d',strtotime($_POST['tgllahir']));
    $jk         = $_POST['jk'];
    $tglinput   = date('y-m-d', strtotime($_POST['tglinput']));
    $jabatan    = $_POST['jabatan'];
    $dept       = $_POST['dept'];

    $update = mysqli_query($koneksi,"UPDATE karyawan SET nama='$nama', tgl_lahir='$tgllahir', jk='$jk', tgl_input='$tglinput',
    jabatan='$jabatan', dept='$dept' WHERE idkaryawan='$idk'");

    if ($update) {
        header("location:index.php?pesan=berhasilupdate");
    } else {
        header("location:index.php?pesan=gagalupdate");
    }

}
?>