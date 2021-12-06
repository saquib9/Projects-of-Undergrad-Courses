<?php
session_start();
include 'db.php';
$conn = OpenCon();

$ID = $_GET['ID'];

$query = "UPDATE `courses` SET `ACCEPTED`= 1 WHERE `ID`='$ID'";

$query_run = mysqli_query($conn,$query);
if($query_run) echo "Approved";
else echo "Not Approved";
echo "<script> window.location.assign('about.php'); </script>";
?>