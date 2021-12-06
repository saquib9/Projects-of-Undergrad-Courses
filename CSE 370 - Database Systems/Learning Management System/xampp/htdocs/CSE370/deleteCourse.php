<?php
session_start();
include 'db.php';
$conn = OpenCon();
$CAT = $_SESSION['category'];
$CID = $_GET['id'];
$q1 = "SELECT DEPT FROM `courses` where `ID`='$CID'";
$query_run1 = mysqli_query($conn,$q1);
$response = mysqli_fetch_assoc($query_run1);
$query = "DELETE FROM `courses` WHERE `ID`='$CID'";
$CID=$response['DEPT'];
echo $CID;
$query_run = mysqli_query($conn,$query);
if($query_run){
                                echo "Deleted";
                                echo "<script> window.location.assign('courses.php?id=$CID'); </script>";
                            }
                            else echo "Not Added";
?>