<?php
session_start();
include 'config.php';
if(isset($_POST['add_to_cart'])){

    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
 
    $check_cart_numbers = mysqli_query($con, "SELECT * FROM cart WHERE name = '$product_name'") or die('query failed');
 
    if(mysqli_num_rows($check_cart_numbers) > 0){
       $message[] = 'already added to cart!';
    }else{
       mysqli_query($con, "INSERT INTO cart (name, price, image) VALUES('$product_name', '$product_price', '$product_image')") or die('query failed');
       $message[] = 'product added to cart!';
    }
 
 }
 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Book Store</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
    <!-- khalti static link -->
    <script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>

</head>
<body>
    
<?php include 'header.php'?>

<!-- home section starts  -->

<section class="home" id="home">

    <div class="swiper home-slider">

        <div class="wrapper">

            <div class="swiper-slide slide" style="background:url(Images/banner.jpg) no-repeat">
                <div class="content">
                    <h3>Welcome</h3>
                    <span>A room without book is like a body without soul</span><br>
                    <a href="#" class="btn">Browse</a>
                </div>
            </div>              
        </div>

    </div>

</section>

<!-- home section ends -->

<!-- products section starts  -->

<section class="products" id="products">

    <h1 class="heading"> exclusive <span>books</span> </h1>
    <div class="box-container">
    <?php  
         $select_products = mysqli_query($con, "SELECT * FROM book LIMIT 6") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
     <form action="" method="post" class="box">
      <img class="image" src="Images/<?php echo $fetch_products['image']; ?>" alt="">
      <div class="name"><?php echo $fetch_products['name']; ?></div>
      <div class="price">Rs.<?php echo $fetch_products['price']; ?>/-</div>
      <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
      <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
      <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
      <input type="submit" value="add to cart" name="add_to_cart" class="btn">
     </form>
      <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
      ?>

    
    

    </div>
</section>
<section class="featured" id="featured">
<h1 class="heading"> featured <span>books</span> </h1>
<div class="box-container">
    <?php  
         $select_products = mysqli_query($con, "SELECT * FROM book LIMIT 3") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
     <form action="" method="post" class="box">
      <img class="image" src="Images/<?php echo $fetch_products['image']; ?>" alt="">
      <div class="name"><?php echo $fetch_products['name']; ?></div>
      <div class="price">Rs.<?php echo $fetch_products['price']; ?>/-</div>
      <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
      <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
      <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
      <input type="submit" value="add to cart" name="add_to_cart" class="btn">
     </form>
      <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
      ?>
</section>

<!-- products section ends -->

<!-- contact section starts  -->
<?php include 'contact.php'?>
<!-- contact section ends -->

<!-- footer section starts  -->
<?php include 'footer.php'?>
<!-- footer section ends -->






<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link -->
<script src="js/script.js"></script>
</body>
</html>