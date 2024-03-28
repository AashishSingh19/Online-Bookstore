<!-- <?php
// Check if the user is logged in, otherwise redirect to login page
// session_start();
// if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
//     header('Location: login.php');
//     exit;
// }

// // Process logout request
// if (isset($_GET['logout'])) {
//     session_destroy();
//     header('Location: login.php');
//     exit;
// }
?> -->

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="adminstyle.css">
</head>
<body>
    <h1>Welcome to the Admin Panel</h1>
    
    <nav>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="products.php">Product Management</a></li>
            <li><a href="orders.php">Order Management</a></li>
            <li><a href="?logout=true">Logout</a></li>
        </ul>
    </nav>
    
    <div>
        <h2>Dashboard</h2>
        <!-- Place your dashboard content here -->
    </div>
</body>
</html>
