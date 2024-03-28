<?php
session_start();
include 'config.php';
if(isset($_POST['submit']))
{
    $email=$_POST['email'];
    $pass=$_POST['password'];
    $sql="SELECT * FROM user WHERE email = '$email' && password='$pass'";
    $result=mysqli_query($con,$sql);
    $count=mysqli_num_rows($result);
    if($count==1){
      $_SESSION['email']=$email;
      header("location:home.php");
    }else{
        echo "Login Failed";
    }
}
?>
