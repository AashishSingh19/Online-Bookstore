<?php
error_reporting(0);
session_start();
include 'config.php';
if(!empty($_POST['submit']))
{
    $email=$_POST['email'];
    $pass=$_POST['password'];
    $sql="SELECT * FROM user WHERE email = '$email' && password='$pass'";
    $result=mysqli_query($con,$sql);
    $count=mysqli_num_rows($result);
    if($count>0){
        header('location:admin_page.php');
    }else{
        echo "Login Failed";
    }
}
?>
