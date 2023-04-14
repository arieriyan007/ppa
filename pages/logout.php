<?php 
session_start();

session_destroy();

// kembali kehalaman login
header("location:../login.php?status=logout");
?>