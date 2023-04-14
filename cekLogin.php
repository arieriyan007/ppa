<?php 
include "koneksi.php";

if (isset($_SESSION['log'])) {
    
} else {
    header("location:../login.php?status=belumlogin");
}
?>