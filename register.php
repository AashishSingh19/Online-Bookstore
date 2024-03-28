<?php
$con=mysqli_connect("localhost","root","","bookstoredb") or die('Connection Failed');
    if(isset($_POST['submit'])){
        $name=mysqli_real_escape_string($con,$_POST['name']);
		$email=mysqli_real_escape_string($con,$_POST['email']);
		$phone=mysqli_real_escape_string($con,$_POST['phone']);
		$pass=mysqli_real_escape_string($con, $_POST['password']);
		$cpass=mysqli_real_escape_string($con,$_POST['cpassword']);
        $sql="INSERT INTO user(name, email, phone, password) VALUES('$name','$email','$phone', '$cpass')";
        if(mysqli_query($con, $sql)){
          echo "<script>alert('User Registered')</script>";
          header('location:login.html');
        }else{
            echo "Error: ".mysqli_error($con);
        }
    }
    
	?>
