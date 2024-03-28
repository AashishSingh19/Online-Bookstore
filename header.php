<html>
    <head>
    <title>Header</title>

<link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

<!-- font awesome cdn link  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<!-- custom css file link  -->
<link rel="stylesheet" href="css/style.css">
    </head>
    <body>
<header class="header">

    <a href="home.php" class="logo"> <i class="fas fa-book"></i> BookThings </a>

    <nav class="navbar">
        <a href="home.php">home</a>
        <a href="#products">books</a>
        <a href="#featured">featured</a>
        <a href="#contact">contact</a>
    </nav>

    <div class="icons">
        <div id="menu-btn" class="fas fa-bars"></div>
        <div id="search-btn" class="fas fa-search"></div>
        <a href="cart.php" class="fas fa-shopping-cart"></a>
        <!-- <a href="" class="fas fa-user"></a> -->
        <button class="button" id="loginButton">Logout</button>
    </div>
    <form action="" class="search-form">
        <input type="search" name="" placeholder="Search here..." id="search-box">
        <label for="search-box" class="fas fa-search"></label>
    </form>

</header>
</body>
</html>

<script>
    // Add an event listener to the button
    document.getElementById("loginButton").addEventListener("click", function() {
        // Redirect to the login page
        window.location.href = "login.html"; // Change this to the actual path of your login page
    });
</script>