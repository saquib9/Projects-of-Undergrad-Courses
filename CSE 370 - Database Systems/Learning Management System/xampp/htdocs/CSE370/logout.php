<?php
session_start();
include 'db.php';
$conn = OpenCon();
$_SESSION['category']='L';
echo "<script> window.location.assign('index.php'); </script>";
?>