<?php
include 'config.php';
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="adminstyle.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
    
    <div class="container">
        <section class="checkout-form">
            <h1 class="heading">Complete your order</h!>
             <div class="display-order">
                <?php
                    $sql="SELECT * FROM cart";
                    $select_cart=mysqli_query($con,$sql);
                    $total=0;
                    $grand_total=0;
                    if(mysqli_num_rows($select_cart)>0){
                        while($fetch_cart=mysqli_fetch_assoc($select_cart)){
                            
                        }
                    }
                ?>
             </div>       

            
            <form action="" method="post">
                <div class="flex">
                    <div class="inputBox">
                        <span>Your Name</span>
                        <input type="text" placeholder="Enter Your Name" name="name" required>
                    </div>
                <div class="inputBox">
                        <span>Your Number</span>
                        <input type="number" placeholder="Enter Your Number" name="num" required>
                    </div>
                <div class="inputBox">
                        <span>Your Email</span>
                        <input type="text" placeholder="Enter Your Email" name="email">
                </div>
                <div class="inputBox">
                        <span>Your Address</span>
                        <input type="text" placeholder="Enter Your Address" name="address">
                </div>
                <div class="inputBox">
                        <span>Payment Method</span>
                        <select name="method">
                            <option value="Cash On Delivery">Cash On Delivery</option>
                            <option value="Credit Card">Credit Card</option>
                            <option value="Khalti">Khalti</option>
                        </select>    
                    </div>
                </div>
                <input type="submit" value="Order Now" name="order" class="btn">
            </form>    
        </section>
    </div>
    








<script src="js/script.js"></script>
</body>
</html>
<script src="js/script.js"></script>