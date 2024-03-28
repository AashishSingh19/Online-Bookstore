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
      header("Location: admin_panel/index.php");
      exit; // It's a good practice to include exit after header to prevent further execution of the script
    }else{
        echo "Login Failed";
    }
}
?>
