<?php
require('db.php');
// If form submitted, insert values into the database.
if (isset($_REQUEST['username'])){
        // removes backslashes
 $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
 $username = mysqli_real_escape_string($con,$username); 
$ID= stripslashes($_REQUEST['ID']);
        //escapes special characters in a string
 $ID = mysqli_real_escape_string($con,$ID); 
 $email = stripslashes($_REQUEST['email']);
 $email = mysqli_real_escape_string($con,$email);
 $password = stripslashes($_REQUEST['password']);
 $password = mysqli_real_escape_string($con,$password);
 $trn_date = date("Y-m-d H:i:s");
        $query = "INSERT into `users` (username,ID, password, email, trn_date)
VALUES ('$username','$ID' ,'".md5($password)."', '$email', '$trn_date')";
        $submit = mysqli_query($con,$query);
        if($submit){
            echo "
<h3>You are registered successfully.</h3>
<br/>Click here to <a href='http://localhost/01/login.php'>Login</a>";
        }
    }else{
?>