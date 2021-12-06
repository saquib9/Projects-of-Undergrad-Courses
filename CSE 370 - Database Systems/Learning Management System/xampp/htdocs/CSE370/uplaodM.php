<?php
session_start();
include 'db.php';
$conn = OpenCon();


$files = $_FILES['file'];
$cID = $_SESSION['CID'];
$UID = 1610;
move_uploaded_file($files["tmp_name"],"uploads/".$files['name']);
$DIR = "uploads/".$files['name'];

$query = "INSERT INTO `Material`(`LINK`, `UID`, `CID`) VALUES ('$DIR',$UID,'$cID')";
$query_run = mysqli_query($conn,$query);
if($query_run){
    echo "Uploaded";
    echo "<script> window.location.assign('course-single.php?id=$cID') </script>";
}
else echo "Not Uploaded";
?>